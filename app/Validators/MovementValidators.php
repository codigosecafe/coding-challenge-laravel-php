<?php

namespace App\Validators;

use App\Entities\Movement;
/**
 * Class MovementValidators
 * @package App\Validators
 */
class MovementValidators
{
    static public function store(): array
    {
        return [
            Movement::NAME => ['required','string', 'unique:movement,name'],
        ];
    }
    static public function dataNameExists(): array
    {
        return [
            Movement::NAME => ['required','string', 'exists:movement,name'],
        ];
    }
    static public function updateOrDestroy(): array
    {
        return [
            Movement::ID => ['required','string', 'exists:movement,id'],
        ];
    }

    static public function messages()
    {
        return [
            Movement::NAME.'.unique' =>  __('movement.JAH_CADASTRADO'),
            Movement::NAME.'.exists' =>  __('movement.NAO_CADASTRADO')
        ];
    }
}
