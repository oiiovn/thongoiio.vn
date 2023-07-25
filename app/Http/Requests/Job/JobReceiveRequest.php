<?php

namespace App\Http\Requests\Job;

use App\Http\Requests\BaseRequest;

class JobReceiveRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    protected function methodPost()
    {
        return [
           'code' => ['required', 'exists:App\Models\Job,code']
        ];
    }
}