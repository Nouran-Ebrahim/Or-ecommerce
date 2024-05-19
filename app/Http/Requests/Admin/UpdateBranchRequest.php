<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\BaseRequest;

class UpdateBranchRequest extends BaseRequest
{
    public function rules()
    {
        return [
            'title_ar' => ['required', 'string'],
            'title_en' => ['required', 'string'],
            'address_ar' => ['required', 'string'],
            'address_en' => ['required', 'string'],
            // 'lat' => ['required', 'string'],
            // 'long' => ['required', 'string'],

            // 'delivery' => ['required', 'boolean'],
            // 'pickup' => ['required', 'boolean'],
            'status' => ['required', 'boolean'],

            // 'close' => ['nullable'],
            // 'close.*' => ['nullable'],
            // 'open' => ['nullable'],
            // 'open.*' => ['nullable'],

            // 'images' => ['sometimes', 'required'],
            // 'images.*' => ['sometimes', 'required', 'image', 'mimes:jpeg,png,webp,jpg,gif,svg'],
        ];
    }
}
