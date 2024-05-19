<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\BaseRequest;
use App\Rules\PhoneLength;

class UpdateClientRequest extends BaseRequest
{
    public function rules()
    {
        return [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'phone' => ['required', 'string','unique:clients,phone,' . request('client'), new PhoneLength($this->input('country_code'), $max = 8)],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            // 'status' => ['sometimes', 'required', 'boolean'],
            'country_code' => ['required', 'string'],
            'phone_code' => ['required', 'string'],
            // 'image' => ['sometimes', 'required', 'image'],
        ];
    }
}
