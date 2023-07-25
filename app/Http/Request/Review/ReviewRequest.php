<?php

namespace App\Http\Request\Review;

use App\Http\Request\BaseRequest;

class ReviewRequest extends BaseRequest
{
    protected function methodPost()
    {
        return [
            'user_id' => ['required'],
            'author_id' => ['required'],
            'rating' => ['required'],
            'title' => ['required'],
            'status' => ['required'],
        ];    
    }
}