<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;

Schedule::call(function (){
    Artisan::call('cache:clear');    
    Artisan::call('config:cache');    
    Artisan::call('view:clear');  
    Artisan::call('route:clear');
})->everySixHours();