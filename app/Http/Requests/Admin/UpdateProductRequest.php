<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\BaseRequest;

class UpdateProductRequest extends BaseRequest
{
    public function rules()
    {
        $rules = [
            'title_ar' => ['required', 'string'],
            'title_en' => ['required', 'string'],
            'material_ar' => ['nullable', 'string'],
            'material_en' => ['nullable', 'string'],
            'desc_ar' => ['nullable', 'string'],
            'desc_en' => ['nullable', 'string'],
            'colors'=>'array|min:1',
            'Sizes'=>'array|min:1',
            'categories'=>'array|min:1',
            'price' => ['nullable', 'numeric'],

            // 'VAT' => ['required', 'string', 'in:inclusive,exclusive'],
            'most_selling' => ['nullable', 'boolean'],
            'popular' => ['nullable', 'boolean'],
            'status' => ['required', 'boolean'],
            'have_discount' => ['required', 'boolean'],

            'images' => ['nullable', 'array'],
            'images.*' => ['image'],
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
