<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/contacts/create',[App\Http\Controllers\ApiController::class, 'create'])->name('api.create-contact');
    Route::post('/contacts/destroy/{id}',[App\Http\Controllers\HomeController::class, 'index'])->name('api.destroy-contact');
    Route::post('/contacts/update/{id}',[App\Http\Controllers\HomeController::class, 'index'])->name('api.update-contact');
    Route::post('/contacts/display',[App\Http\Controllers\HomeController::class, 'index'])->name('api.display-contact');
});
