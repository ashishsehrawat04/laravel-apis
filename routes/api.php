<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::post("createuser",[ApiController::class,"CreateUser"]);
Route::get("getuserwith_orders",[ApiController::class,"getUserorders"]);