<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\BaseRequest;

class StoreColorRequest extends BaseRequest
{
    public function rules()
    {
        return [
            'title_ar' => ['required', 'string'],
            'title_en' => ['required', 'string'],
            'hexa' => ['required', 'string'],
            // 'image'=>'required',
            'status' => ['required', 'boolean'],
        ];
    }
}
