<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(UserRequest $request)
    {
        return "Всё введено корректно!<br>".response()->json($request->validated());
    }
}
