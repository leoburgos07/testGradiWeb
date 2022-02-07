<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

//Owner routes
Route::get('/owners',[App\Http\Controllers\OwnerController::class, 'create']);
Route::post('/createOwner',[App\Http\Controllers\OwnerController::class, 'createOwner']);
Route::get('/listOwners', [App\Http\Controllers\OwnerController::class, 'index']);
Route::get('/deleteOwner/{id}',[App\Http\Controllers\OwnerController::class, 'destroy']);
Route::get('/editOwner/{id}',[App\Http\Controllers\OwnerController::class, 'edit']);
Route::post('/updateOwner/{id}',[App\Http\Controllers\OwnerController::class, 'update']);
Route::post('/searchNameOwner',[App\Http\Controllers\OwnerController::class, 'search']);
Route::get('/searchOwner',[App\Http\Controllers\OwnerController::class, 'searchOwner']);
Route::post('/searchIdentificationOwner',[App\Http\Controllers\OwnerController::class, 'searchByIdentification']);

//Vehicle routes
Route::get('/vehicles',[App\Http\Controllers\VehicleController::class, 'create']);
Route::post('/createVehicle',[App\Http\Controllers\VehicleController::class, 'createVehicle']);
Route::get('/listVehicles',[App\Http\Controllers\VehicleController::class, 'index']);
Route::get('/deleteVehicle/{id}',[App\Http\Controllers\VehicleController::class, 'destroy']);
Route::post('/searchVehicle',[App\Http\Controllers\VehicleController::class, 'searchVehicle']);

Route::get('/newFunctionality',[App\Http\Controllers\NewFuncionalityController::class, 'index']);