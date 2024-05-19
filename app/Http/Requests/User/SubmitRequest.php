<?php

namespace App\Http\Requests\User;

use App\Http\Requests\BaseRequest;

class SubmitRequest extends BaseRequest
{
    public function rules()
    {
        $arr = [
            'phone' => 'required|digits_between:6,12',
            'name' => 'required',
        ];
        if (request('delivery_id') == 1) {
            $arr[] = [
                'region_id' => 'required',
            ];
        }

        return $arr;
    }
}
