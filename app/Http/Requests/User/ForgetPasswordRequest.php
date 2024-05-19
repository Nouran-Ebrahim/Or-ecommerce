<?php

namespace App\Http\Requests\User;

use App\Http\Requests\BaseRequest;

class ForgetPasswordRequest extends BaseRequest
{
    public function rules()
    {
        return [
            'phone' => 'required|digits_between:8,12',
        ];
    }
}
