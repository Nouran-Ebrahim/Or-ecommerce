<?php

namespace App\Http\Requests\User;

use App\Http\Requests\BaseRequest;

class ProfileRequest extends BaseRequest
{
    public function rules()
    {
        return [
            'email' => 'required|email|unique:clients,email,'.auth('client')->user()->id,
            'name' => 'required|between:3,20',
            'password' => 'nullable|min:6',
        ];
    }
}
