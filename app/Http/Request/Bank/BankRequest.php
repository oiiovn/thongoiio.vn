<?php

namespace App\Http\Request\Bank;

use App\Http\Request\BaseRequest;

class BankRequest extends BaseRequest
{
    protected function methodPost()
    {
        return [
            'user_id' => ['required'],
            'bank_name' => ['required'],
            'account_name' => ['required'],
            'account_number' => ['required', 'unique:App\Models\UserBankAccount,account_number'],
        ];    
    }
}