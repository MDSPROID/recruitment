<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These 
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/ 

// CLEAR CACHE
Route::get('/clear-cache', function() {
	$date_start = date('Y-m-d H:i:s');
	$exitCode1 = Artisan::call('cache:clear');
    $exitCode4 = Artisan::call('route:clear');
    $exitCode5 = Artisan::call('view:clear');
    $exitCode6 = Artisan::call('config:cache');
    return "Cache Clear : ".$exitCode1."<br>"."Routed Clear : ".$exitCode4."<br>"."View Cache Clear : ".$exitCode5."<br>"."Config Cache Clear : ".$exitCode6."<br>"; 
});
// END CLEAR CACHE