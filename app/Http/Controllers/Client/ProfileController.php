<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\Address;
use App\Models\Client;
use App\Rules\PhoneLength;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function profile(Request $request)
    {
        $currentOrders = Order::with('Products')->where('client_id', auth('client')->id())->whereIn('status', [0, 1])->whereIn('follow', [0, 1, 2])->latest()->get();
        $previousOrders = Order::with('Products')->where([['client_id', auth('client')->id()]])->whereIn('status', [1])->whereIn('follow', [3])->latest()->get();
        $Client = auth('client')->user();
        $addresses = $Client->addresses;
        $defaultAddress = Address::with(['country', 'region'])->where('client_id', $Client->id)->where('default', 1)->first();

        $Orders = Order::where('client_id', auth('client')->user()->id)->get();

        return view('Client.profile', compact('currentOrders', 'Orders', 'previousOrders', 'Client', 'defaultAddress', 'addresses'));
    }
    public function edit(Request $request)
    {
        $Client = auth('client')->user();
        $addresses = $Client->addresses;
        $defaultAddress = Address::with(['country', 'region'])->where('client_id', $Client->id)->where('default', 1)->first();

        $Orders = Order::where('client_id', auth('client')->user()->id)->get();

        return view('Client.edit-profile', compact('Orders', 'Client', 'defaultAddress', 'addresses'));
    }

    public function orderDetails(Request $request)
    {
        $Orders = Order::where('client_id', auth('client')->user()->id)->get();
        $Client = auth('client')->user();
        $addresses = $Client->addresses;
        $defaultAddress = Address::with(['country', 'region'])->where('client_id', $Client->id)->where('default', 1)->first();

        return view('Client.orderDetails', compact('Orders', 'addresses', 'defaultAddress'));
    }
    public function changePassword(Request $request)
    {
        $Client = auth('client')->user();
        $addresses = $Client->addresses;
        $defaultAddress = Address::with(['country', 'region'])->where('client_id', $Client->id)->where('default', 1)->first();

        $Orders = Order::where('client_id', auth('client')->user()->id)->get();
        return view('Client.changePassword', compact('Orders', 'Client', 'defaultAddress', 'addresses'));
    }
    public function orderView(Request $request)
    {
        $Order = Order::with(['client', 'address', 'address.country', 'address.region', 'DeliveryMethod', 'PaymentMethod', 'OrderProducts', 'OrderProducts.Color.Header'])->where('id', $request->orderId)->first();
        // dd($Order);
        return response()->json(['order' => $Order]);
    }

    public function updatePassword(Request $request)
    {

        $validator = validator($request->all(), [
            'current' => 'required',
            'password' => 'required|confirmed|min:6',
        ]);
        if ($validator->fails()) {
            // dd($validator->getMessageBag());
            return redirect()->back()->withInput($request->all())->withErrors($validator->getMessageBag());
        }
        $client = Client::where('id', client_id())->first();

        if (!Hash::check($request->current, auth('client')->user()->password)) {
            return back()->withInput($request->all())->withErrors(['current' => trans('trans.Current Password is Wrong')]);
        }
        if (Hash::check($request->password, auth('client')->user()->password)) {
            return back()->withInput($request->all())->withErrors(['password' => trans('trans.New Password must be different from Current Password')]);
        }

        // Update the user's password
        $client->update([
            'password' => bcrypt($request->password),
            'password_confirmation' => bcrypt($request->password_confirmation),
        ]);
        // dd(1);

        alert()->success(__('trans.updatedSuccessfully'));

        return redirect()->back();
    }
    public function update(Request $request)
    {
        // dd($request->all());
        $request->merge([
            'newphone' => $request->phone_code . $request->phone
        ]);

        $validator = validator($request->all(), [
            'last_name' => 'required|string',
            'first_name' => 'required|string',
            'newphone' => ['unique:clients,newphone,' . auth('client')->user()->id],
            'phone' => ["required", 'numeric', new PhoneLength($request->input('country_code'), $max = 8)],
            'email' => ['required', 'email', 'unique:clients,email,' . auth('client')->user()->id]
        ]);
        $validator->after(function ($validator) {
            if ($validator->errors()->has('newphone')) {
                $validator->errors()->add('phone', $validator->errors()->first('newphone'));
                $validator->errors()->forget('newphone');
            }
        });
        if ($validator->fails()) {
            // dd($validator->getMessageBag());
            return redirect()->back()->withInput($request->all())->withErrors($validator->getMessageBag());

        }
        $client = auth('client')->user();
        // $client->name = $request->name;
        // $client->email = $request->email;
        $client->update($request->all());
        // if ($request->has('password') && ! empty($request->password)) {
        //     $client->password = bcrypt($request->password);
        // }
        // $client->save();
        alert()->success(__('trans.profileUpdated'));

        return redirect()->route('client.profile');
        // return redirect()->back();
    }
}
