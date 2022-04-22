<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodolistController;
use App\Http\Controllers\ItensController;
use App\Http\Controllers\CalendarioController;
use Illuminate\Support\Facades\Auth;
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
Auth::routes([
    'register' => false, // Registration Routes...
    'reset' => false, // Password Reset Routes...
    'verify' => false, // Email Verification Routes...
  ]);
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('index');
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');
# TODO 
Route::get('/', [TodolistController::class, 'index']);
Route::get('/create', [TodolistController::class, 'create']);
Route::post('/store', [TodolistController::class, 'store']);
Route::get('/edit/{id}', [TodolistController::class, 'edit']);
Route::post('/update/{id}', [TodolistController::class, 'update']);
Route::get('/delete/{id}', [TodolistController::class, 'destroy']);

# ITENS
Route::get('/itens/{id}/{todo}', [ItensController::class, 'itens']);
Route::get('/additem/{id}/{todo}', [ItensController::class, 'add']);
Route::post('/storeitem/{id}/{todo}', [ItensController::class, 'store']);
Route::get('/edititens/{id}/{todo_id}/{todo}', [ItensController::class, 'edit']);
Route::post('/updateitem/{id}/{todo_id}/{todo}', [ItensController::class, 'update']);
Route::get('/deleteitem/{id}/{todo_id}/{todo}', [ItensController::class, 'destroy']);

# CALENDARIO
Route::get('/calendario', [CalendarioController::class, 'calendario']);
Route::get('/calendario/{data_calendario}', [CalendarioController::class, 'task']);


