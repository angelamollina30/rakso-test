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
    Route::get('/contacts/destroy/{id}',[App\Http\Controllers\ApiController::class, 'destroy'])->name('api.destroy-contact');
    Route::get('/contacts/update/{id}',[App\Http\Controllers\ApiController::class, 'update'])->name('api.update-contact');
    Route::post('/contacts/display',[App\Http\Controllers\ApiController::class, 'display'])->name('api.display-contact');
});
