<?php

namespace App\Admin\Http\Requests\News;

use App\Admin\Http\Requests\BaseRequest;

class NewsRequest extends BaseRequest
{
    protected function methodPost()
    {
        return [
            'admin_id' => ['required'],
            'title' => ['required'],
            'content' => ['required'],
            'avatar' => ['required'],
        ];    
    }

    protected function methodPut()
    {
        return [
            'id' => ['required'],
            'admin_id' => ['required'],
            'title' => ['required'],
            'content' => ['required'],
            'avatar' => ['required'],
        ];    
    }
}