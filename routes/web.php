<?php

use App\Http\Controllers\ServiceController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/about', function () {
    return view('about');
});
Route::get('/contact', function () {
    return view('contact');
});

Route::get('/service', [ServiceController::class, 'service']);
Route::get('/list', [UserController::class, 'list']);
// Route::get('/list2', [UserController::class, 'list2']);

Route::get('/create', [UserController::class, 'create']);
Route::post('/create',[UserController::class, 'store']);

Route::get('/edit/{id}',[UserController::class, 'edit']);
Route::post('/edit/{id}',[UserController::class, 'update']);

Route::delete('/delete/{id}',[UserController::class, 'destroy']);
//                                                   method destroy