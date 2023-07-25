<?php

namespace App\Admin\Http\Requests\Privacy;

use App\Admin\Http\Requests\BaseRequest;

class PrivacyRequest extends BaseRequest
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
