<?php

namespace App\Http\Request\Auth;

use App\Http\Request\BaseRequest;

class PasswordRequest extends BaseRequest
{
    protected function methodPost()
    {
        return [
            'id' => 'required',
            'password' => 'required',
            're_password' => 'required',
        ];
    }
}