<?php

use App\Http\Controllers\API\AccessTokensController;
use App\Http\Controllers\API\CartController;
use App\Http\Controllers\API\CategoriesController;
use App\Http\Controllers\API\MedicineController;
use App\Http\Controllers\API\OfferController;
use App\Http\Controllers\API\PharmaciesController;
use App\Http\Controllers\API\PharmacyController;
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
Route::post('login', [AccessTokensController::class, 'store']);
Route::delete('login', [AccessTokensController::class, 'destroy'])->middleware('auth:sanctum');


Route::middleware('auth:sanctum')->group(function () {

//الاقسام
Route::apiResource('categories' , CategoriesController::class);

// الصيدليات
Route::apiResource('pharmacies' , PharmacyController::class);

// الصيادلة
Route::apiResource('pharmacists' , PharmaciesController::class);


Route::apiResource('medicines' , MedicineController::class);


Route::apiResource('cart' , CartController::class);


Route::apiResource('offers' , OfferController::class);


});
