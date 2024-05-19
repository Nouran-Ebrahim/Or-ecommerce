<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\BaseRequest;

class MailOfferRequest extends BaseRequest
{
    public function rules()
    {
        return [
            'title' => ['required', 'string', 'max:255'],
            'desc' => ['required', 'string'],
            'image' => ['required', 'image'],
        ];
    }
}
