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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('customer/',[\App\Http\Controllers\CustomerController::class,'index'])->name('customer.api.index');
Route::post('customer/update/{id}',[\App\Http\Controllers\CustomerController::class,'update'])->name('customer.api.update');
Route::post('customer/create/',[\App\Http\Controllers\CustomerController::class,'create'])->name('customer.api.create');
Route::delete('customer/delete/{id}',[\App\Http\Controllers\CustomerController::class,'delete']);
Route::get('customer/show/{id}',[\App\Http\Controllers\CustomerController::class,'customerShow'])->name('customer.api.show');
