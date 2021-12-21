<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use App\Http\Resources\UserResource;

class UserController extends Controller
{
    public function __construct(UserService $service)
    {
        $this->service = $service;
        $this->resource = UserResource::class;
    }
}
