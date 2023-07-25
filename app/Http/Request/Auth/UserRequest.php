<?php

namespace App\Http\Request\Auth;

use App\Http\Request\BaseRequest;

class UserRequest extends BaseRequest
{
    protected function methodPost()
    {
        return [
            'id' => ['required', 'exists:App\Models\User,id'],
            'fullname' => ['required'],
            'avatar' => 'nullable|file|image|mimes:jpeg,png,jpg,gif|max:2048',
            'cover_photo' => 'nullable|file|image|mimes:jpeg,png,jpg,gif|max:2048',
            'gender' => ['nullable'],
            'province_id' => ['nullable'],
            'district_id' => ['nullable'],
            'ward_id' => ['nullable'],
        ];
    }
}