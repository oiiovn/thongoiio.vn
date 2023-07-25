<?php

namespace App\Http\Request\Transactions\Deposit;

use App\Http\Request\BaseRequest;

class DepositRequest extends BaseRequest
{
    protected function methodPost()
    {
        return [
            'user_id' => ['required'],
            'amount' => ['required','integer','min:50000'],
            'bank_code' => ['required'],
        ];    
    }
    protected function prepareForValidation()
    {
        $amount = str_replace(',', '', $this->input('amount'));
        $this->merge([
            'amount' => intval($amount)
        ]);

    }
}