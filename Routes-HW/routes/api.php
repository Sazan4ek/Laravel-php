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

Route::get('/users', function()
{
    $users = [
        ['name' => 'Artyom', 'id' => 1],
        ['name' => 'Alex', 'id' => 2],
        ['name' => 'Vasya', 'id' => 3],
        ['name' => 'Petya', 'id' => 4]
    ];
    return response()->json($users);
});