<?php

namespace App\Http\Requests\User;

use App\Http\Requests\BaseRequest;

class RegisterRequest extends BaseRequest
{
    public function rules()
    {
        return [
            'name' => ['required', 'string', 'min:3', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'phone' => ['required', 'string', 'max:255', 'unique:clients,phone'],
            'country_id' => ['required'],
            'password' => 'required|min:6',
        ];
    }
}
