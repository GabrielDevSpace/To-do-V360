<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodolistController;

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

# TODO 
Route::get('/', [TodolistController::class, 'index']);
Route::get('/create', [TodolistController::class, 'create']);
Route::post('/store', [TodolistController::class, 'store']);
Route::get('/edit/{id}', [TodolistController::class, 'edit']);
Route::post('/update/{id}', [TodolistController::class, 'update']);
Route::get('/delete/{id}', [TodolistController::class, 'destroy']);
