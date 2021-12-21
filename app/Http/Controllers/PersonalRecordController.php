<?php

namespace App\Http\Controllers;

use App\Services\PersonalRecordService;
use App\Http\Resources\PersonalRecordResource;


class PersonalRecordController extends Controller
{
    //

    public function __construct(PersonalRecordService $service)
    {
        $this->service = $service;
        $this->resource = PersonalRecordResource::class;
    }
}
