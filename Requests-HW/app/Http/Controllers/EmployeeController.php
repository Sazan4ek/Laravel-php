<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeeRequest;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function store(EmployeeRequest $request)
    {
        return "Данный работник валиден!";
    }
}
