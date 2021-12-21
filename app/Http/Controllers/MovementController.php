<?php

namespace App\Http\Controllers;

use App\Services\MovementService;
use App\Http\Resources\MovementResource;

class MovementController extends Controller
{
    public function __construct(MovementService $service)
    {
        $this->service = $service;
        $this->resource = MovementResource::class;
    }
}
