<?php

use App\Http\Resources\rentersCollection;
use App\Http\Resources\VehiclesCollection;
use App\Models\Vehicles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Resources\rentersResource;
use App\models\renters;

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


//get all renting companies
Route::get('/renters/all', function () {
    return new rentersCollection(renters::all());
});

Route::get('/renters/{id}', function ($id) {
    return new rentersResource(renters::findOrFail($id));
});



//get all vehicles
Route::get('/vehicles/all', function () {
    return new VehiclesCollection(Vehicles::all());
});


