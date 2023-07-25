<?php

namespace App\Http\Request\Auth;

use App\Http\Request\BaseRequest;

class RegisterRequest extends BaseRequest
{
    protected function methodPost()
    {
        return [
            'fullname' => ['required'],
            'username' => ['required', 'unique:App\Models\User,username'],
            'phone' => ['required', 'unique:App\Models\User,phone'],
            'email' => ['required','unique:App\Models\User,email'],
            'password' => ['required'],
            'confirm-password' => ['required'],
        ];    
    }
}