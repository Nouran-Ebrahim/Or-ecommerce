<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show()
    {
        $countries = Country::Active()->get();

        return view('auth.profile', compact('countries'));
    }

    public function update(Request $request)
    {
        if ($request->password) {
            auth()->user()->update(['password' => Hash::make($request->password)]);
        }
        if ($request->country_code && $request->phone_code) {
            auth()->user()->update($request->only('country_code', 'phone_code'));
        }
        auth()->user()->update($request->only('name', 'email', 'phone'));

        alert()->success(__('trans.updatedSuccessfully'));

        return redirect()->back();
    }
}
