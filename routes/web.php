<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\faController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/sign_up', function () {
    return view('sign_up');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
});

// CREATE
Route::post('/register_user', [faController::class, 'registerUser']);
Route::post('/session_destroy', [faController::class, 'sessionDestroy']);

// READ
Route::post('/get_data/{fullname}/{email}/', [faController::class, 'getData']);
Route::post('/login/{email}/{password}/', [faController::class, 'login']);
Route::get('/get_email', [faController::class, 'getEmail']);
