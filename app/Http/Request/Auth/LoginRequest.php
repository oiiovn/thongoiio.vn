<?php

namespace App\Http\Request\Auth;

use App\Http\Request\BaseRequest;

class LoginRequest extends BaseRequest
{
    protected function methodPost()
    {
        return [
            'email' => 'required',
            'password' => 'required'
        ];
    }
}