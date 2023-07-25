<?php

namespace App\Admin\Http\Requests\Job;

use App\Admin\Http\Requests\BaseRequest;
use App\Admin\Rules\UserIsShop;

class JobRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    protected function methodPost()
    {
        if($this->routeIs('admin.job.clone')){
            return [
                'id' => ['required', 'exists:App\Models\Job,id']
            ];
        }elseif($this->routeIs('admin.job.store')){
            return [
                // 'name' => ['required', 'string'],
                'shop_id' => ['required', new UserIsShop],
                // 'money_product' => ['required', 'numeric'],
                // 'note' => ['nullable', 'string'],
                'is_virtual' => ['nullable', 'boolean'],
                'attribute_option_id' => ['required', 'array'],
                'attribute_option_id.*' => ['required', 'exists:App\Models\AttributeOption,id']
             ];
        }
        return [];
    }

    protected function methodPut()
    {
        return [
            'id' => ['required', 'exists:App\Models\Job,id'],
            // 'name' => ['required', 'string'],
            // 'money_product' => ['required', 'numeric'],
            // 'note' => ['nullable', 'string'],
            'is_cancelled' => ['nullable', 'boolean'],
        ];
    }
}