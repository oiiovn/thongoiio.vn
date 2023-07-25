<?php

namespace App\Admin\Http\Requests\Attribute;

use App\Admin\Http\Requests\BaseRequest;

class AttributeOptionRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    protected function methodPost()
    {
        return [
            'attribute_id' => ['required', 'exists:App\Models\Attribute,id'],
            'name' => ['required', 'string'],
            'position' => ['required', 'integer'],
            'meta' => ['nullable', 'array'],
            'price' => ['required', 'numeric', 'min:0'],
            'note' => ['nullable'],
            'desc' => ['nullable'],
        ];
    }

    protected function methodPut()
    {
        return [
            'id' => ['required', 'exists:App\Models\AttributeOption,id'],
            'name' => ['required', 'string'],
            'position' => ['required', 'integer'],
            'price' => ['required', 'numeric', 'min:0'],
            'meta' => ['nullable', 'array'],
            'note' => ['nullable'],
            'desc' => ['nullable'],
        ];
    }
}