<?php

use App\Http\Controllers\ProductoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('/products',ProductoController::class . '@list');
Route::post('/products/create',ProductoController::class . '@create');
Route::get('/products/{id}',ProductoController::class . '@detailProduct');
Route::put('/products/{id}',ProductoController::class . '@update');
Route::delete('/products/{id}',ProductoController::class . '@delete');
