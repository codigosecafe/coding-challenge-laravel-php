<?php

namespace App\Validators;

use App\Entities\User;
/**
 * Class UserValidators
 * @package App\Validators
 */
class UserValidators
{
    static public function store(): array
    {
        return [
            User::NAME => ['required','string', 'unique:user,name'],
        ];
    }
    static public function dataNameExists(): array
    {
        return [
            User::NAME => ['required','string', 'exists:user,name'],
        ];
    }
    static public function updateOrDestroy(): array
    {
        return [
            User::ID => ['required','string', 'exists:user,id'],
        ];
    }

    static public function messages()
    {
        return [
            User::NAME.'.unique' =>  __('user.MOVEMENT_JAH_CADASTRADO'),
            User::NAME.'.exists' =>  __('user.MOVEMENT_NAO_CADASTRADO')
        ];
    }
}
