<?php

namespace App\Admin\Http\Requests\Transaction\Withdrawn;

use App\Admin\Http\Requests\BaseRequest;
use App\Enums\Transaction\Withdrawn\WithdrawnStatus;
use Illuminate\Validation\Rules\Enum;

class WithdrawnRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    protected function methodPost()
    {
        return [
            'id' => ['required', 'exists:App\Models\Withdrawn,id'],
            'bank_id' => ['required'],
            'status' => ['required', new Enum(WithdrawnStatus::class)],
            'amount' => ['required'],
            'fee' => ['required'],
            'note' => ['nullable']
        ];
    }

    protected function methodPut()
    {
        return [
            'id' => ['required', 'exists:App\Models\Withdrawn,id'],
            'bank_id' => ['required'],
            'status' => ['required', new Enum(WithdrawnStatus::class)],
            'amount' => ['required'],
            'fee' => ['required'],
            'note' => ['nullable']
        ];
    }
}
