<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\BaseRequest;

class StoreSocialMediaIconRequest extends BaseRequest
{
    public function rules()
    {
        return [
            'link' => ['required', 'string'],
            'icon' => ['required', 'string'],
        ];
    }
}
