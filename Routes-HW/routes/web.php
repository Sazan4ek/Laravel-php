<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/welcome', function()
{
    return "Добро пожаловать в Laravel!";   
});

Route::get('/user/{id?}', function($id = null)
{
    if(is_null($id)) return "Пользователь анонимен";
    else
    return "Пользователь с ID: $id";
});

Route::get('/post/{slug}', function()
{
    return "Всё введено валидно!";
})->where('slug', '^[a-z0-9-]+$');

Route::match(['get','post'], '/submit-contact-form', function(Request $request)
{
    if($request->method() === "POST") return "Форма отправлена успешно";
    else return "¯\_(ツ)_/¯ ";        
});
Route::get('/greet/{name}', function($name)
{
    return view('greet', ['name' => $name]);
});

Route::get('/api/users', function()
{
    $users = [
        ['name' => 'Artyom', 'id' => 1],
        ['name' => 'Alex', 'id' => 2],
        ['name' => 'Vasya', 'id' => 3],
        ['name' => 'Petya', 'id' => 4]
    ];
    return response()->json($users);
});

Route::get('/time', function()
{
    return response()->json([
        'time' => Carbon\Carbon::now()->timezone('Europe/Minsk')->format('H:i:m'),
        'date' => Carbon\Carbon::now()->timezone('Europe/Minsk')->format('Y-m-d')
    ]);
}); 

Route::redirect('/old-home', '/new-home');

Route::any('/new-home', function()
{
    return 'Вы успешно попали сюда';    
});

Route::post('/contact', function(Request $request)
{
    $request->validate([
        'name' => ['required', 'string', 'max:15'],
        'email' => ['required', 'email:rfc,dns']
    ]);
    return 'Всё введено валидно!';
})->name('contact-route');

Route::get('/calculate/{operation}/{number1}/{number2}', function($operation, $a, $b)
{
    switch($operation)
    {
        case 'sum':
            return $a+$b;
        break;

        case 'subtraction':
            return $a-$b;
        break;

        case 'division':
            if($b == 0)
            {
                return "На ноль делить нельзя/";
            }
            return $a/$b;
        break;

        case 'multiplication':
            return $a*$b;
        break;
    }
})->whereIn('operation', ['sum', 'subtraction', 'division', 'multiplication'])
->where(['number1' => '^-?[0-9]+$', 'number2' => '^-?[0-9]+$']);