<?php

namespace App\Admin\Http\Requests\Tutorial;

use App\Admin\Http\Requests\BaseRequest;

class TutorialRequest extends BaseRequest
{
    protected function methodPost()
    {
        return [
            'admin_id' => ['required'],
            'title' => ['required'],
            'content' => ['required'],
            'link' => ['required'],
        ];
    }

    protected function methodPut()
    {
        return [
            'id' => ['required'],
            'admin_id' => ['required'],
            'title' => ['required'],
            'content' => ['required'],
            'link' => ['required'],
        ];
    }
}
