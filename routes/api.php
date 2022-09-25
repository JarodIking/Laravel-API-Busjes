<?php

use App\Http\Controllers\OrdersController;
use App\Http\Controllers\RentersController;
use App\Http\Controllers\VehiclesController;
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

//renter routes
Route::apiResource('renters', rentersController::class);

//vehicle routes
Route::apiResource('vehicles', VehiclesController::class);

//order routes
Route::apiResource('orders', OrdersController::class)->except([
    'index',
]);


