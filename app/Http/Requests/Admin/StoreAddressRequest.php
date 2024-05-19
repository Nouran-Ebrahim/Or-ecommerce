<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\BaseRequest;

class StoreAddressRequest extends BaseRequest
{
    public function rules()
    {
        return [
            'client_id' => ['required', 'nullable', 'exists:clients,id'],

            'lat' => ['required', 'string'],
            'long' => ['required', 'string'],

            'additional_directions' => ['nullable', 'string'],
        ];
    }
}
