<?php

namespace App\Admin\Rules;

use App\Enums\User\UserRoles;
use App\Models\User;
use Illuminate\Contracts\Validation\Rule;

class UserIsShop implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        //
        if($user = User::find($value)){
            return $user->roles === UserRoles::Shop;
        }
        return false;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Shop không tồn tại.';
    }
}
