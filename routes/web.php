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

Route::post('/add', [TodoController::class, 'add']);

Route::post('/delete/{id}', [TodoController::class, 'delete']);

Route::post('/update/{id}', [TodoController::class, 'update']);

Route::get('/find', [TodoController::class, 'find']);
Route::get('/search', [TodoController::class,
'search']);

require __DIR__.'/auth.php';
