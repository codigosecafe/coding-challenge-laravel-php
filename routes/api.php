<?php

use Illuminate\Support\Facades\Route;


Route::apiResource('user', UserController::class);
Route::apiResource('movement', MovementController::class);
Route::apiResource('personal-record', PersonalRecordController::class)->except('update');;
Route::apiResource('rank-movement', RankMovementController::class)->only(['index', 'show']);
