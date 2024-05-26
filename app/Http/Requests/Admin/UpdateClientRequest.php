<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\BaseRequest;
use App\Rules\PhoneLength;

class UpdateClientRequest extends BaseRequest
{
    public function rules()
    {
        $this->merge([
            'newphone' => $this->phone_code . $this->phone,
        ]);

        return [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => 'required|email|unique:clients,email,'.request('client'),
            'phone' => ['required', 'string', new PhoneLength($this->input('country_code'), $max = 8)],
            'newphone' => 'unique:clients,newphone,' . request('client'),
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            // 'status' => ['sometimes', 'required', 'boolean'],
            'country_code' => ['required', 'string'],
            'phone_code' => ['required', 'string'],
            // 'image' => ['sometimes', 'required', 'image'],
        ];
    }
    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            if ($validator->errors()->has('newphone')) {
                $validator->errors()->add('phone', $validator->errors()->first('newphone'));
                $validator->errors()->forget('newphone');
            }
        });
    }
}
