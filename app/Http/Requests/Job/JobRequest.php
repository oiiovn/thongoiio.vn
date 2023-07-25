<?php

namespace App\Http\Requests\Job;

use App\Http\Requests\BaseRequest;

class JobRequest extends BaseRequest
{
    protected $inputValidate = [];

    protected function methodPut()
    {
        $this->inputValidate['id'] = ['required', 'exists:App\Models\Job,id'];
        $this->inputValidate['desc'] = ['nullable'];
        
        if($this->routeIs('job.update_proccess') || $this->routeIs('job.update_history_proccess')){
            $this->inputValidate['money_product_addition'] = ['nullable', 'numeric', 'min:0'];
            $this->inputValidate['desc'] = $this->routeIs('job.update_history_proccess') ? ['required'] : $this->inputValidate['desc'];
        }

        return $this->inputValidate;
    }
}