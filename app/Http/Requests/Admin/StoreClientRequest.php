<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\BaseRequest;

class StoreClientRequest extends BaseRequest
{
    public function rules()
    {
        return [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'phone' => ['required', 'string'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            // 'status' => ['sometimes', 'required', 'boolean'],
            'country_code' => ['required', 'string'],
            'phone_code' => ['required', 'string'],
            // 'image' => ['sometimes', 'required', 'image'],
        ];
    }
}
