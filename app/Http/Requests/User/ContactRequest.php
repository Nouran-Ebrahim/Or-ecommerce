<?php

namespace App\Http\Requests\User;

use App\Http\Requests\BaseRequest;

class ContactRequest extends BaseRequest
{
    public function rules()
    {
        return [
            'name' => 'required|between:3,50',
            'email' => 'required|email',
            'phone' => 'required|digits_between:8,12',
            'subject' => 'required|between:3,50',
            'message' => 'required|between:3,500',
        ];
    }
}
