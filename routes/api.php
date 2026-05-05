<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\DetailController;
use App\Http\Controllers\Api\FoodPlaceController;
use App\Http\Controllers\Api\GoHuntController;
use App\Http\Controllers\Api\UploadController;
use App\Models\User;
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

Route::post('/auth/register', [AuthController::class, 'register']);

Route::post('/auth/login', [AuthController::class, 'login']);

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/profile', function (Request $request) {
        return auth()->user();
    });

    Route::post('/auth/logout', [AuthController::class, 'logout']);

    Route::get('/hunt', [GoHuntController::class, 'getHunt']);

    Route::get('/places', [FoodPlaceController::class, 'getFoodPlaces']);
    Route::get('/favorite', [FoodPlaceController::class, 'getFavorite']);
    Route::get('/places/recommended', [FoodPlaceController::class, 'getRecommendedFoodPlaces']);
    Route::get('/category', [FoodPlaceController::class, 'getCategory']);

    Route::get('/places/{id}', [DetailController::class, 'getDetail']);
    Route::post('/places/{id}', [DetailController::class, 'setFavorite']);
    Route::delete('/places/{id}', [DetailController::class, 'deleteFavorite']);
    Route::post('/review', [DetailController::class, 'setReview']);
    Route::post("upload", [UploadController::class, 'upload']);
    Route::get("getRecommendedFoodPlaces", [FoodPlaceController::class, 'getRecommendedFoodPlaces']);
});
