<?php

namespace App\Http\Controllers\Payment;

use App\Functions\WhatsApp;
use App\Http\Controllers\Controller;
use App\Mail\OrderSummary;
use App\Models\Order;
use App\Models\Transaction;
use Illuminate\Support\Facades\Mail;

class TapController extends Controller
{
    ////////////////Tap
    public function VerifyTapTransaction($order_id)
    {
        dd('error');
        $Order = \App\Models\Order::with(['client'])->find($order_id);

        $fields = (object) (object) [];

        $fields->amount = (float) $Order->net_total;
        $fields->currency = Country()->currancy_code ?? 'BHD';
        $fields->save_card = false;
        $fields->description = 'Description';
        $fields->statement_descriptor = 'Sample';

        $fields->metadata = (object) [];
        $fields->metadata->udf1 = $Order->id;

        $fields->reference = (object) [];
        $fields->reference->transaction = 'txn_0001';
        $fields->reference->order = 'ord_0001';

        $fields->receipt = (object) [];
        $fields->receipt->email = true;
        $fields->receipt->sms = true;

        $fields->customer = (object) [];
        $fields->customer->first_name = $Order->client->name;
        $fields->customer->middle_name = '';
        $fields->customer->last_name = '';
        $fields->customer->email = $Order->client->email ?? 'info@emcan-group.com';
        $fields->customer->phone = (object) [];
        $fields->customer->phone->country_code = str_replace('+', '', Country()->phone_code);
        $fields->customer->phone->number = $Order->client->phone;

        $fields->merchant = (object) [];
        $fields->merchant->id = '';

        $fields->source = (object) [];
        $fields->source->id = 'src_all';

        $fields->post = (object) [];
        $fields->post->url = env('APP_URL');

        $fields->redirect = (object) [];
        $fields->redirect->url = env('APP_URL').'/payment/tap/response';

        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => 'https://api.tap.company/v2/charges',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => json_encode($fields),
            CURLOPT_HTTPHEADER => [': ', 'Authorization: Bearer '.env('TAP_SECRET'), 'Content-Type: application/json'],
        ]);
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        if ($err) {
            echo 'cURL Error #:'.$err;
        } else {
            $data = json_decode($response);
            try {
                $Order->transaction_number = $data->id;
                $Order->save();
                $redirect = $data->transaction->url;

                return $redirect;
                // return redirect()->away($redirect);
            } catch (\Exception $e) {
                toast($data->errors[0]->description, 'error');
                alert()->error($data->errors[0]->description);

                return redirect()->route('client.home');
            }

        }
    }

    public function response()
    {
        $charge_data = $this->ResponseTapTransaction(env('TAP_SECRET'), request()->tap_id);
        $Order = Order::with('client')->where('transaction_number', request()->tap_id)->first();

        $Client = $Order->client;
        Transaction::create([
            'client_id' => $Client->id,
            'transaction_number' => $charge_data['id'],
            'value' => $charge_data['amount'],
            'result' => $charge_data['status'],
            'type' => 'TAP',
            'order_id' => $Order->id,

        ]);

        if ($charge_data['status'] == 'PAID' || $charge_data['status'] == 'CAPTURED') {
            $Order->status = 0;
            $Order->save();
            Mail::to(['apps@emcan-group.com', setting('email'), $Client->email])->send(new OrderSummary($Order));
            session()->forget('cart');
            session()->save();
            WhatsApp::SendOrder($Order);
            alert()->success(__('trans.order_added_successfully'));
            alert()->success(__('trans.successProcess'));

            return redirect()->route('client.home');
        } else {

            Mail::to(['apps@emcan-group.com', setting('email'), $Client->email])->send(new OrderSummary($Order));
            WhatsApp::SendOrder($Order);

            toast(__('trans.failedProcess'), 'error');
            alert()->error(__('trans.failedProcess'));

            return redirect()->route('client.home');
        }
    }

    public function ResponseTapTransaction($token, $charge_id)
    {
        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => "https://api.tap.company/v2/charges/$charge_id",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_POSTFIELDS => '{}',
            CURLOPT_HTTPHEADER => [
                'authorization: Bearer '.$token,
            ],
        ]);
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);

        curl_close($curl);
        if ($err) {
            $response['status'] = 'cURL Error #:'.$err;
        }
        $response = json_decode($response, true);

        return $response;
    }
}
