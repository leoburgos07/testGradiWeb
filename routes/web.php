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

Route::get('/owners',[App\Http\Controllers\OwnerController::class, 'create']);
Route::post('/createOwner',[App\Http\Controllers\OwnerController::class, 'createOwner']);
Route::get('/listOwners', [App\Http\Controllers\OwnerController::class, 'index']);
Route::get('/deleteOwner/{id}',[App\Http\Controllers\OwnerController::class, 'destroy']);
