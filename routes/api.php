<?php

use App\Http\Controllers\Authentication\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');
Route::post("/auth/register", [AuthController::class, "register"]);
Route::post('/auth/login', [AuthController::class, 'login']);

Route::group(["middleware"=> ['auth:sanctum']],function(){
    Route::get("/", [AuthController::class, 'index']);
    Route::get("/auth/logout", [AuthController::class, 'logout']);
});

Route::apiResource('orders', OrderController::class);