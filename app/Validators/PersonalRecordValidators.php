<?php

namespace App\Validators;

use App\Entities\PersonalRecord;
/**
 * Class PersonalRecordValidators
 * @package App\Validators
 */
class PersonalRecordValidators
{
    static public function store(): array
    {
        return [
            PersonalRecord::USER_ID => ['required','int', 'exists:user,id'],
            PersonalRecord::MOVEMENT_ID => ['required','int', 'exists:movement,id'],
            'score' => ['required'],
        ];
    }
    static public function dataExists(): array
    {
        return [
            PersonalRecord::ID => ['required','int', 'exists:personal_record,id'],
        ];
    }
    static public function updateOrDestroy(): array
    {
        return [
            PersonalRecord::ID => ['required','int', 'exists:personal_record,id'],
        ];
    }

    static public function messages()
    {
        return [
            PersonalRecord::ID.'.exists'          =>  __('movement.NAO_CADASTRADO'),
            PersonalRecord::MOVEMENT_ID.'.exists' =>  __('movement.NAO_CADASTRADO'),
            PersonalRecord::USER_ID.'.exists'     =>  __('movement.NAO_CADASTRADO')
        ];
    }
}
