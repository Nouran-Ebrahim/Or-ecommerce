<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\Client;
use App\Models\Country;
use App\Models\Cart;
use App\Models\WhishList;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Rules\PhoneLength;
use App\Functions\WhatsApp;
use App\Rules\UniquePhone;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        // dd($request->all());
      
        $client_id = client_id();
        $request->merge([
            'newphone' => $request->phone_code . $request->phone
        ]);

        $validator = validator($request->all(), [

            'phone' => ["required", 'numeric', new PhoneLength($request->input('country_code'), $max = 8)],
            'newphone' => ["exists:clients,newphone"],
            'password' => 'required|min:6',
        ]);
        $validator->after(function ($validator) {
            if ($validator->errors()->has('newphone')) {
                $validator->errors()->add('phone', $validator->errors()->first('newphone'));
                $validator->errors()->forget('newphone');
            }
        });
        if ($validator->fails()) {
        
            return redirect()->back()->withInput($request->all())->withErrors($validator->getMessageBag());

        }
        // $this->validate($request, [
        //     'phone' => ["required", new PhoneLength($request->input('country_code'), $max = 8), "exists:clients,phone", 'numeric'],

        //     'password' => 'required|min:6',
        // ]);
        if (auth('client')->attempt(['newphone' => $request['newphone'], 'password' => $request['password'], 'status' => 1])) {
            // dd(1);

            toast(__('trans.loginSuccessfully'), 'success');
            // dd($client_id);
            if (client_id()) {
                // dd(1);
                $wishLists = WhishList::where('client_id', $client_id)->get();
                if ($wishLists->count() > 0) {
                    DB::table('whish_lists')->where('client_id', $client_id)->update(['client_id' => auth('client')->id()]);
                }
                $oldCart = Cart::where('client_id', auth('client')->user()->id)->get();
                foreach ($oldCart as $cart) {
                    $cart->delete();
                }
                $carts = Cart::where('client_id', $client_id)->get();
                if (count($carts) > 0) {
                    DB::table('cart')->where('client_id', $client_id)->update(['client_id' => auth('client')->id()]);

                }
                session()->forget('client_id');
            }

            $redirect = session()->get('redirect');
            if ($redirect) {
                session()->forget('redirect');
                return redirect()->away($redirect['route']);
            } else {
                return redirect()->route('client.profile');
            }
        }
        // toast(__('trans.emailPasswordIncorrect'), 'error');

        return redirect()->back()->withInput($request->only('phone', 'remember', 'country_code', 'phone_code', 'password'))->withErrors(['password' => trans('trans.Wrong Password')]);
        // return redirect()->back();
    }

    public function register(Request $request)
    {
        // dd($request->all());
        $request->merge([
            'newphone' => $request->register_phone_code . $request->register_phone
        ]);
        $validator = validator($request->all(), [
            'last_name' => 'required|string',
            'first_name' => 'required|string',
            'register_country_code' => "required",
            'register_phone' => ["required", 'numeric', new PhoneLength($request->input('register_country_code'), $max = 8)],
            'newphone' => ['unique:clients,newphone'],
            'register_password' => 'required|min:6',
            'email' => 'required|email|unique:clients,email'
        ]);
        $validator->after(function ($validator) {
            if ($validator->errors()->has('newphone')) {
                $validator->errors()->add('register_phone', $validator->errors()->first('newphone'));
                $validator->errors()->forget('newphone');
            }
        });
        if ($validator->fails()) {
            // dd($validator->getMessageBag());
            return redirect()->back()->withInput($request->all())->withErrors($validator->getMessageBag());

        }
        $client_id = client_id();
        $client = Client::create([
            'last_name' => $request->get('last_name'),
            'first_name' => $request->get('first_name'),
            'phone_code' => $request->register_phone_code,
            'country_code' => $request->register_country_code,
            'phone' => $request->register_phone,
            'newphone' => $request->newphone,
            'password' => bcrypt($request->register_password),
            'email' => $request->email,
        ]);
        auth('client')->login($client);
        toast(__('trans.profileCompleted'), 'success');

        return redirect()->route('client.profile');
    }

    public function profile(Request $request)
    {
        $client_id = client_id();
        Client::where('id', auth('client')->id())->update([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => bcrypt($request->get('password')),
        ]);
        toast(__('trans.updatedSuccessfully'), 'success');

        return redirect()->route('client.profile');
    }
    public function otpPage($id, Request $request)
    {

        //    dd(decrypt($id));
        return view('Client.otpPage', ['id' => $id]);
    }
    public function Resend(Request $request)
    {
        $Client = Client::where('id', decrypt($request->ssh))->first();
        // dd($Client);
        $Client->update([
            'otp' => WhatsApp::SendOTP($Client->newphone)
        ]);
    }
    public function restPasswordPage($id, Request $request)
    {

        //    dd(decrypt($id));
        return view('Client.restPasswordPage', ['id' => $id]);
    }

    public function restPassword(Request $request)
    {

        // dd($request->all());
        $this->validate($request, [
            'password' => 'required|min:6|confirmed',
        ]);
        $Client = Client::where('id', decrypt($request->ssh))->first();
        if (Hash::check($request->password, $Client->password)) {
            return redirect()->back()->withErrors(['password' => trans('trans.New Password must be different from Current Password')]);
        }
        $Client->update([
            "password" => bcrypt($request->password),
            "password_confirmation" => bcrypt($request->password_confirmation),
        ]);
        // Auth::guard('client')->login($Client);
        // return redirect('/');
        return redirect(route('client.login'));
    }
    public function sendOtp(Request $request)
    {

        // dd($request->all());
        $Client = Client::where('id', decrypt($request->ssh))->first();
        if ($Client->otp == $request->digit1 . $request->digit2 . $request->digit3 . $request->digit4 . $request->digit5 . $request->digit6) {
            return redirect(route('client.restPasswordPage', encrypt($Client->id)));
        } else {
            toast(__('trans.invaild otp'), 'error');

            return redirect()->back();
        }
    }
    public function forget(Request $request)
    {
        // $this->validate($request, [
        //     'phone' => ["required", new PhoneLength($request->input('country_code'), $max = 8), "exists:clients,phone"],
        // ]);
        $request->merge([
            'newphone' => $request->phone_code . $request->phone
        ]);

        $validator = validator($request->all(), [

            'phone' => ["required", 'numeric', new PhoneLength($request->input('country_code'), $max = 8)],
            'newphone' => ["exists:clients,newphone"],
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
        $Client = Client::where('newphone', $request->newphone)->first();

        $Client->update([
            'otp' => WhatsApp::SendOTP($request->newphone)
        ]);
        // dd($link);
        // auth('client')->login($Client);
        // toast(__('trans.loginSuccessfully'), 'success');

        // return redirect()->route('client.home');
        return redirect(route('client.otpPage', encrypt($Client->id)));
    }

    public function logout(Request $request)
    {
        if (auth('client')->check()) {
            auth('client')->logout();
            $request->session()->flush();
            // $request->session()->invalidate();
            $request->session()->regenerateToken();
        }
        toast(__('trans.logoutSuccessfully'), 'success');

        return redirect()->route('client.home');
    }
}
