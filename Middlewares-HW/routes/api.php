<?php

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

Route::middleware('adminToken')->group(function (){
    Route::group(['prefix' => '/payments'], function(){
        Route::get('/', function(){
            return "*Логика обработки платежей нормального человека*";
        });
        Route::post('/store', function(){
            return "*Ещё одна логика обработки платежей нормального человека*";
        });
    });

    Route::group(['prefix' => 'admin/payments'], function(){
        Route::get('/', function(){
            return "*Логика обработки платежей админа*";
        });
        Route::post('/store', function(){
            return "*Ещё одна логика обработки платежей админа*";
        });
    });
});
