<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\BaseRequest;

class StoreProductRequest extends BaseRequest
{
    public function rules()
    {
        $rules = [
            'title_ar' => ['required', 'string'],
            'title_en' => ['required', 'string'],

            'desc_ar' => ['nullable', 'string'],
            'desc_en' => ['nullable', 'string'],
            'material_ar' => ['nullable', 'string'],
            'material_en' => ['nullable', 'string'],

            'price' => ['nullable', 'numeric'],
            'colors'=>'array|min:1',
            'Sizes'=>'array|min:1',
            'categories'=>'array|min:1',
            // 'VAT' => ['required', 'string', 'in:inclusive,exclusive'],
            'popular' => ['nullable', 'boolean'],
            'most_selling' => ['nullable', 'boolean'],
            'status' => ['required', 'boolean'],
            'have_discount' => ['required', 'boolean'],

            'images' => ['nullable', 'array'],
            'images.*' => ['nullable', 'image'],
        ];

        if (request()->have_discount) {
            $rules += [
                'discount' => ['required'],
                'from' => ['required'],
                'to' => ['required'],
            ];
        }

        return $rules;
    }
}
