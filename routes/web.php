<?php

use App\Http\Controllers\StudentController;
use App\Http\Controllers\JoinController;
use App\Http\Controllers\Auth\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Authentication Routes
Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('login.post', [AuthController::class, 'postLogin'])->name('login.post');
Route::get('registration', [AuthController::class, 'registration'])->name('register');
Route::post('registration.post', [AuthController::class, 'postRegistration'])->name('register.post');
Route::get('dashboard', [AuthController::class, 'dashboard'])->name('dashboard');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/home', function () {
    return view('home');
});

// Student CRUD Routes
Route::resource('students', StudentController::class);

Route::resource('/test', App\Http\Controllers\StudentController::class); 

Route::controller(StudentController::class)->group(function()
{
    Route::get('/home-2', 'Home');
    //Route::get('/home-2', 'index');
    //Route::get('/home-2', 'create');
    //Route::get('/home-2', 'Home');
});

// Join Routes
Route::controller(JoinController::class)->group(function(){
    Route::get('/inner-join', 'InnerJoin');
    Route::get('/left-join', 'LeftJoin');
    Route::get('/right-join', 'RightJoin');
    Route::get('/full-outer-join', 'FullOuterJoin');
});