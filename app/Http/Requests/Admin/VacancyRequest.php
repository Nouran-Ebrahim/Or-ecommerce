<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\BaseRequest;

class VacancyRequest extends BaseRequest
{
    public function rules()
    {
        return [
            'title_ar'=> 'required',
            'title_en'=> 'required',
            'desc_ar'=> 'nullable',
            'desc_en'=> 'nullable',
            'from'=>'required|date',
            'to'=>'required|date',
            'status' => ['boolean'],
        ];
    }
}
