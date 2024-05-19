<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\BaseRequest;

class UpdatePaymentMethodRequest extends BaseRequest
{
    public function rules()
    {
        return [
            'title_ar' => ['required', 'string'],
            'title_en' => ['required', 'string'],
            'status' => ['required', 'boolean'],
            'images' => ['sometimes'],
            'images.*' => ['sometimes', 'image'],
        ];
    }
}
