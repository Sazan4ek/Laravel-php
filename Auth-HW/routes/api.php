<?php

use App\Http\Controllers\AuthApiCustomerController;
use App\Http\Controllers\OrderController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('getToken', [AuthApiCustomerController::class, 'login']);

Route::middleware('auth:sanctum')->group(function(){
    
    Route::post('order/create', [OrderController::class, 'create']);
    Route::post('order/edit', [OrderController::class, 'edit']);
    Route::post('order/delete', [OrderController::class, 'delete']);
    Route::post('logout', [AuthApiCustomerController::class, 'logout']);
});