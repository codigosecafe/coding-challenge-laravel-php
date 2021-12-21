<?php
namespace App\Services;
use App\Entities\Movement;
use App\Services\MovementService;


class RankMovementService extends MovementService
{
    /**
    * RankMovementService constructor.
    */
    public function __construct(Movement $movement)
    {
        parent::__construct($movement);
        $this->classNameNow = __CLASS__;
        $this->relations = ['personal_records', 'personal_records.user'];
    }

}
