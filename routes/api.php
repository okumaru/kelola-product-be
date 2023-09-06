<?php

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware(['cors:api'])->group(function () {
    Route::get('/', \App\Http\Controllers\FetchProduct::class);
    Route::put('/', \App\Http\Controllers\AddProduct::class);
    Route::post('/{product}', \App\Http\Controllers\UpdateProduct::class);
    Route::delete('/{product}', \App\Http\Controllers\DeleteProduct::class);
});