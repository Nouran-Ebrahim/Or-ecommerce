<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\BaseRequest;

class UpdateAddressRequest extends BaseRequest
{
    public function rules()
    {
        return [
            'client_id' => ['nullable', 'nullable', 'exists:clients,id'],

            'lat' => ['nullable', 'string'],
            'long' => ['nullable', 'string'],

            'additional_directions' => ['nullable', 'string'],
        ];
    }
}
