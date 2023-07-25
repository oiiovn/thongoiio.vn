<?php

namespace App\Admin\Http\Requests\Attribute;

use App\Admin\Http\Requests\BaseRequest;
use App\Enums\Attribute\AttributeType;
use Illuminate\Validation\Rules\Enum;

class AttributeRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    protected function methodPost()
    {
        return [
            'name' => ['required', 'string'],
            'type' => ['required', new Enum(AttributeType::class)],
            'position' => ['required', 'integer'],
            'desc' => ['nullable'],
        ];
    }

    protected function methodPut()
    {
        return [
            'id' => ['required', 'exists:App\Models\Attribute,id'],
            'name' => ['required', 'string'],
            'type' => ['required', new Enum(AttributeType::class)],
            'position' => ['required', 'integer'],
            'desc' => ['nullable'],
        ];
    }
}