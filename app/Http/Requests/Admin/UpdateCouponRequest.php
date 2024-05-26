<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\BaseRequest;
use Illuminate\Validation\Rule;

class UpdateCouponRequest extends BaseRequest
{
   
    public function rules()
    {
        return [
            'code' => ['required', 'string','unique:coupons,code,'.request('id')],
            'type' => ['required', 'string'],

            'discount' => ['nullable', 'numeric'],
            'percent_off' => ['nullable', 'numeric'],

            'from' => ['required', 'date'],
            'to' => ['required', 'date'],

            'status' => ['required', 'boolean'],
            // 'products_ids' => ['required'],
            // 'products_ids.*' => ['required'],
        ];
    }
}
