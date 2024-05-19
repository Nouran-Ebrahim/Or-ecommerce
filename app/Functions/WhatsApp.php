<?php

namespace App\Functions;

class WhatsApp
{
    public static function SendOTP($phone)
    {
        $otp = rand(100000, 999999);

        $body = '';
        $body .= '\n *'.env("APP_NAME").' App* \n';
        $body .= '\n *Your Verification Code Is* '.$otp.' \n';
        $body .= '\n Powered By *Emcan Solutions*';

        self::SendWhatsApp($phone, $body);

        return $otp;
    }
    public static function SendMessage($phone,$link)
    {
        $body = '';
        $body .= '\n *OR* \n';
        $body .= '\n *Your Rest Password link Is* ' . $link . ' \n';
        $body .= '\n Powered By *Emcan Solutions*';

        self::SendWhatsApp($phone, $body);

    }
    public static function SendOrder($Order)
    {
        $message = '\n *An Order Has Been Placed By '.$Order->client->name.' ('.env('APP_NAME').')* \n';
        $message .= '\n *Order Number :* '.$Order->id;
        if ($Order->status == 5) {
            $message .= '\n *'.__('trans.not_complete').'* ';
        }

        $message .= '\n *Payment :* '.$Order->PaymentMethod?->title_en;

        $message .= '\n *Client Name :* '.$Order->client->first_name.' '.$Order->client->last_name;
        $message .= '\n *Client Number :* '.$Order->client->phone;
        $message .= '\n *Order Time :* '.$Order->created_at.' \n';

        if ($Order->delivery_id == 1) {
            $message .= '\n *Country :* '.$Order->address->country->title_en.' \n';
            $message .= '\n *Region :* '.$Order->address->region->title_en.' \n';
            $message .= '\n *District :* '.$Order->address->zone.' \n';
            $message .= '\n *Road :* '.$Order->address->road.' \n';
            $message .= '\n *Building Number :* '.$Order->address->building_no.' \n';
            if($Order->address->flat != null){
                $message .= '\n *Flat :* '.$Order->address->flat.' \n';
            }
            if($Order->address->floor_no != null){
                $message .= '\n *Floor Number :* '.$Order->address->floor_no.' \n';
            }
            if($Order->address->note != null){
                $message .= '\n *Note :* '.$Order->address->note.' \n';
            }
        } elseif ($Order->delivery_id == 2) {
            $message .= '\n *Type :* '.'Pick Up'.' \n';
        }

        $message .= '\n *Products :* \n';
        foreach ($Order->OrderProducts as $item) {
            $message .= '\n *Item :* '.strip_tags($item->Product->title_en);
            if ($item->Size) {
                $message .= '\n *Size :* '.$item->Size->title_en;
            }
            if ($item->Color) {
                $message .= '\n *Color :* '.$item->Color->title_en;
            }
            $message .= '\n *Price :* '.number_format(Country()->currancy_value * $item->price, Country()->decimals, '.', '').' '.Country()->currancy_code_en;
            if ($item->note) {
                $message .= '\n *Note :* '.$item->note.'\n';
            }
            $message .= '\n *Quantity :* '.$item->quantity.'\n';
        }
        $message .= '\n';
        $message .= '\n *SubTotal :* '.number_format(Country()->currancy_value * $Order->sub_total, Country()->decimals, '.', '').' '.Country()->currancy_code_en;
        if ($Order->discount > 0) {
            $message .= '\n *Discount :* '.number_format(Country()->currancy_value * $Order->discount, Country()->decimals, '.', '').' '.Country()->currancy_code_en;
        }
        if ($Order->vat > 0) {
            $message .= '\n *VAT :* '.number_format(Country()->currancy_value * $Order->vat, Country()->decimals, '.', '').' '.Country()->currancy_code_en;
        }
        if ($Order->coupon > 0) {
            $message .= '\n *Coupon :* '.number_format(Country()->currancy_value * $Order->coupon, Country()->decimals, '.', '').' '.Country()->currancy_code_en;
            $message .= '\n *Sub Total after coupon :* '.number_format(Country()->currancy_value * $Order->sub_total_after_coupon, Country()->decimals, '.', '').' '.Country()->currancy_code_en;

        }
        if ($Order->charge_cost > 0) {
            $message .= '\n *Delivery Cost :* '.number_format(Country()->currancy_value * $Order->charge_cost, Country()->decimals, '.', '').' '.Country()->currancy_code_en;
        }
        $message .= '\n *NetTotal :* '.number_format(Country()->currancy_value * $Order->net_total, Country()->decimals, '.', '').' '.Country()->currancy_code_en;
        $message .= '\n  \n';

        $message .= '\n '.setting('order_whatsapp_text_'.lang());
        $message .= '\n *Powered By Emcan Solutions* \n';

        self::SendWhatsApp($Order->client->phone_code.$Order->client->phone, $message);
        // self::SendWhatsApp(Setting('whatsapp'), $message);
    }

    public static function GetToken()
    {
        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_URL => 'https://emcan.bh/api/UltraCredentials',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_POSTFIELDS => 'token=zuvzajw7goMh20q5YVu0&domain='.$_SERVER['SERVER_NAME'],
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_HTTPHEADER => [
                'content-type: application/x-www-form-urlencoded',
            ],
        ]);
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);

        return json_decode($response);
    }

    public static function SendWhatsApp($numbers, $message)
    {
        $EmcanWhats = self::GetToken();
        $instance = $EmcanWhats->instance;
        $token = $EmcanWhats->token;
        if ($EmcanWhats->active) {
            $numbers = is_array($numbers) ? $numbers : [$numbers];
            foreach ($numbers as $number) {
                $number = str_replace('++', '+', $number);
                $curl = curl_init();
                curl_setopt_array($curl, [
                    CURLOPT_URL => 'https://api.ultramsg.com/'.$instance.'/messages/chat',
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => '',
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 30,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => 'POST',
                    CURLOPT_POSTFIELDS => "token=$token&to=$number&body=$message&priority=1&referenceId=",
                    CURLOPT_HTTPHEADER => [
                        'content-type: application/x-www-form-urlencoded',
                    ],
                ]);
                $response = curl_exec($curl);
                $err = curl_error($curl);
                curl_close($curl);
            }
        }
    }
}
