<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;
use App\Http\Middleware\Authenticate;

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

Route::get('/', [TodoController::class, 'index'])->middleware('auth');

Route::get('/add', [TodoController::class, 'add']);
Route::post('/add', [TodoController::class, 'create']);

Route::get('/delete', [TodoController::class, 'delete']);
Route::post('/delete/{id}', [TodoController::class, 'remove']);

Route::get('/update', [TodoController::class, 'edit']);
Route::post('/update/{id}', [TodoController::class, 'update']);



require __DIR__.'/auth.php';
