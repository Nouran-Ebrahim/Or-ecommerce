<?php

use App\Models\Cart;
use App\Models\Category;
use App\Models\Country;
use App\Models\Delivry;
use App\Models\Payment;
use App\Models\Setting;
use App\Models\SocialMediaIcons;
use Illuminate\Support\Facades\Config;

function format_number($number)
{
    return number_format($number, Country()->decimals, '.', '');
}
function CalcCart()
{
    $carts = Cart::where('client_id', client_id())->with('Product', 'Color', 'Color.Header', 'Size')->get();
    $subTotal = 0;
    foreach ($carts as $cart) {
        $subTotal = $subTotal + ($cart->Product->CalcPrice() * $cart->quantity);
    }
    $vat = number_format($subTotal * (setting('VAT') / 100), Country()->decimals, '.', '');
    $total = number_format($vat + $subTotal, Country()->decimals, '.', '');
    return [
        'carts'=>$carts,
        'subTotal' => number_format($subTotal, Country()->decimals, '.', ''),
        'vat' => $vat,
        'total' => $total
    ];
}
function cart_count()
{
    if (!Config::get('cart_count')) {
        Config::set('cart_count', Cart::where('client_id', client_id())->count());
    }

    return Config::get('cart_count');
}
function client_id()
{
    if (auth('client')->check()) {
        return auth('client')->id();
    } else {
        if (!session()->get('client_id')) {
            session()->put('client_id', rand(99999, 999999));
        }

        return session()->get('client_id');
    }
}

function Payments()
{
    if (!Config::get('Payments')) {
        Config::set('Payments', Payment::Active()->get());
    }

    return Config::get('Payments');
}

function Deliveries()
{
    if (!Config::get('Deliveries')) {
        Config::set('Deliveries', Delivry::Active()->get());
    }

    return Config::get('Deliveries');
}

function lang($lang = null)
{
    if (isset ($lang)) {
        return app()->islocale($lang);
    } else {
        return app()->getlocale();
    }
}

function DT_Lang()
{
    if (lang('ar')) {
        return '//cdn.datatables.net/plug-ins/1.10.16/i18n/Arabic.json';
    } else {
        return '//cdn.datatables.net/plug-ins/1.10.16/i18n/English.json';
    }
}

function Countries()
{
    if (!Config::get('Countries')) {
        Config::set('Countries', Country::Active()->get());
    }

    return Config::get('Countries');
}

// function Country($id = 2)
// {
//     if (! Config::get('Country')) {
//         Config::set('Country', Countries()->where('id', $id)->first());
//     }

//     return Config::get('Country');
// }
function Country($id = NULL)
{
    if (request()->route()->getName() == 'Client.submit') {
        $id = 2;
    } else {
        $id = $id ?? (session()->get('country') ?? 2);
    }
    if (!Config::get('Country')) {
        Config::set('Country', Countries()->where('id', $id)->first());
    }

    return Config::get('Country');
}
function Settings()
{
    if (!Config::get('Settings')) {
        Config::set('Settings', Setting::where('status',1)->get());
    }

    return Config::get('Settings');
}

function Categories()
{
    if (!Config::get('Categories')) {
        Config::set('Categories', Category::Active()->get());
    }

    return Config::get('Categories');
}

function setting($key)
{
    return Settings()->where('key', $key)->first()->value ?? null;
}
function image_path($file)
{
    if ($file && file_exists(public_path($file))) {
        return $file;
    }

    return setting('logo');
}

function SocialMediaIcons()
{
    if (!Config::get('SocialMediaIcons')) {
        Config::set('SocialMediaIcons', SocialMediaIcons::get());
    }

    return Config::get('SocialMediaIcons');
}
