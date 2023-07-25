<?php

namespace App\Http\Requests\Job;

use App\Http\Requests\BaseRequest;

class JobManagerRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    protected function methodPost()
    {
        if($this->routeIs('job.manager.clone')){
            return [
                'id' => ['required', 'exists:App\Models\Job,id']
            ];
        }
        return [
        //    'name' => ['required', 'string'],
    //    'money_product' => ['required', 'numeric'],
        //    'note' => ['nullable', 'string'],
           'attribute_option_id' => ['required', 'array'],
           'attribute_option_id.*' => ['required', 'exists:App\Models\AttributeOption,id']
        ];
    }

    protected function methodPut()
    {
        return [
            'id' => ['required', 'exists:App\Models\Job,id'],
        ];
    }
}