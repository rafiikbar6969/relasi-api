<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\CustomerController;
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

route::get('v1/customer', [CustomerController::class, 'index']);

route::post('v1/customer', [CustomerController::class, 'add']);

route::get('v1/customer/{id}', [CustomerController::class, 'show']);

route::patch('v1/customer/{id}', [CustomerController::class, 'update']);

route::delete('v1/customer/{id}', [CustomerController::class, 'destroy']);