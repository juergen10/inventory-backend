<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CustomerController;
use App\Http\Controllers\Api\OptionController;
use App\Http\Controllers\Api\VariantController;
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

Route::post('login', [AuthController::class, 'login']);

Route::middleware('auth:api')->group(function () {
    Route::get('me', [AuthController::class, 'me']);
    Route::get('variants', [VariantController::class, 'index']);
    Route::get('variants/{uuid}', [VariantController::class, 'getByUuid']);
    Route::get('customers', [CustomerController::class, 'index']);
    Route::get('options', [OptionController::class, 'index']);
    Route::post('customers', [CustomerController::class, 'store']);
    Route::get('customers/{uuid}', [CustomerController::class, 'getByUuid']);
    Route::post('customers/{uuid}', [CustomerController::class, 'update']);
    Route::delete('customers/{uuid}', [CustomerController::class, 'delete']);
});