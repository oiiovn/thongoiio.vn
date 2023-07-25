<?php

namespace App\Http\Request\Transactions\Withdrawn;

use App\Http\Request\BaseRequest;

class WithdrawnRequest extends BaseRequest
{
    protected function methodPost()
    {
        return [
            'user_id' => ['required'],
            'amount' => ['required', 'integer', 'min:50000'],
            'bank_id' => ['required'],
        ];
    }
    public function messages()
    {
        return [
            'bank_id.required' => 'Vui lòng thêm ngân hàng trước khi rút tiền'
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
