<?php

use App\Http\Controllers\UserController;
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
Route::get('/', [UserController::class, 'index'])->name('users');

// Route Users
Route::get('/users', [UserController::class, 'index'])->name('users');
Route::get('/users/create', [UserController::class, 'create']);
Route::post('/users/create-user', [UserController::class, 'createUser']);
Route::post('/users/add-image', [UserController::class, 'addImage']);
Route::get('/users/edit/{id}', [UserController::class, 'edit']);
Route::post('/users/update/{id}', [UserController::class, 'update']);
Route::get('/users/delete/{id}', [UserController::class, 'delete']);
Route::get('/users/detail/{id}', [UserController::class, 'detail']);

Route::get('/users/search', [UserController::class, 'search']);

Route::get('/form/report', [UserController::class, 'report'])->name('form/report');