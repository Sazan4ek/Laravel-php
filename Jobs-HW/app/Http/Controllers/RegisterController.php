<?php

namespace App\Http\Controllers;

use App\Jobs\SendWelcomeEmailJob;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index(Request $request)
    {
        $username = $request->input('fullName');
        $email = $request->input('email');

        SendWelcomeEmailJob::dispatch($email, $username);

        return "ok";
    }
}
