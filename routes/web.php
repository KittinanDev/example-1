<?php

use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('home');
});

Route::resource('/test', App\Http\Controllers\StudentController::class); 

Route::controller(StudentController::class)->group(function()
{
    Route::get('/home-2', 'Home');
    //Route::get('/home-2', 'index');
    //Route::get('/home-2', 'create');
    //Route::get('/home-2', 'Home');
});