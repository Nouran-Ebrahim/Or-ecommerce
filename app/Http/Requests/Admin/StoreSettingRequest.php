<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\BaseRequest;

class StoreSettingRequest extends BaseRequest
{
    public function rules()
    {
        return [
            'key' => ['required', 'string'],
            'type' => ['required', 'string'],
            'valuetype' => ['required', 'string'],
            'value' => ['string'],
            'Imagevalue' => ['image'],
        ];
    }
}
