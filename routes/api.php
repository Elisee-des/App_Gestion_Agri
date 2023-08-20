<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\FaitiereController;
use App\Http\Controllers\Api\GroupementController;
use App\Http\Controllers\Api\PaysController;
use App\Http\Controllers\Api\ProducteurController;
use App\Http\Controllers\Api\ProductionController;
use App\Http\Controllers\Api\ProvincesController;
use App\Http\Controllers\Api\RegionController;
use App\Http\Controllers\Api\UserController;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::post('login',[AuthController::class,'login'])->middleware(['api-login','throttle']);

Route::middleware(['auth:api'])->group(function () {
    Route::ApiResource('producteurs',ProducteurController::class);
    Route::post('importproducteurs',[ProducteurController::class, 'importProducteur']);
    Route::ApiResource('faitieres',FaitiereController::class);
    Route::ApiResource('groupements',GroupementController::class);
    Route::ApiResource('productions',ProductionController::class);
    Route::ApiResource('utilisateurs',UserController::class);
    Route::ApiResource('pays',PaysController::class);
    Route::ApiResource('regions',RegionController::class);
    Route::get('region/{id}',[RegionController::class,'ville']);
    Route::get('province/{id}',[RegionController::class,'province']);
    Route::ApiResource('provinces',ProvincesController::class);

});