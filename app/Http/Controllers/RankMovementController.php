<?php

namespace App\Http\Controllers;

use App\Services\RankMovementService;
use App\Http\Resources\RankMovementResource;

class RankMovementController extends Controller
{

    public function __construct(RankMovementService $service)
    {
        $this->service = $service;
        $this->resource = RankMovementResource::class;
    }
}
