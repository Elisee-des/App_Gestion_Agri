<?php

use App\Http\Controllers\Api\AuthController;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\FaitiereController;
use App\Http\Controllers\Api\GroupementController;
use App\Http\Controllers\Api\PaysController;
use App\Http\Controllers\Api\ProducteurController;
use App\Http\Controllers\Api\ProductionController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\RegionController;
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

Route::post('login',[AuthController::class,'login'])->middleware(['api-login','throttle']);

Route::middleware(['auth:api'])->group(function () {
    Route::ApiResource('producteurs',ProducteurController::class);
    Route::ApiResource('faitieres',FaitiereController::class);
    Route::ApiResource('groupements',GroupementController::class);
    Route::ApiResource('productions',ProductionController::class);
    Route::ApiResource('utilisateurs',UserController::class);
    Route::ApiResource('pays',PaysController::class);
    Route::ApiResource('regions',RegionController::class);
});
// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
