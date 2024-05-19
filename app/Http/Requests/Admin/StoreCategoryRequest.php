<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\BaseRequest;

class StoreCategoryRequest extends BaseRequest
{
    public function rules()
    {
        return [
            'title_ar' => ['required', 'string'],
            'title_en' => ['required', 'string'],
            'status' => ['required', 'boolean'],
            'image'=>'required',
            'is_parent'=>'sometimes|in:1',
            'parent_id'=>'nullable|exists:categories,id',
        ];
    }
}
