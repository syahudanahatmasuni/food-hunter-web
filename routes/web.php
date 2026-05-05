<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\FoodPlaceController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\ReviewController;
use App\Http\Controllers\Admin\FavoriteAdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\GoHuntController;
use App\Http\Controllers\TempatMakanController;
use App\Http\Controllers\FavoriteController;

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

Route::get('/', [HomeController::class, 'index'])
    ->name('home');

Route::get('/detail', [DetailController::class, 'index'])
    ->name('detail');

Route::post('/detail/favorite', [DetailController::class, 'setFavorite'])
    ->name('detail.set.favorite');

Route::delete('/detail/favorite/{id}', [DetailController::class, 'deleteFavorite'])
    ->name('detail.delete.favorite');

Route::post('/detail/review', [DetailController::class, 'setReview'])
    ->name('detail.review');

Route::post('/detail/rating', [DetailController::class, 'setRating'])
    ->name('detail.rating');

Route::get('/go-hunt', [GoHuntController::class, 'index'])
    ->name('go-hunt');

Route::get('/user', [UserController::class, 'index'])
    ->name('user');

Route::get('/tempat-makan', [TempatMakanController::class, 'index'])
    ->name('tempat-makan');

Route::get('/favorite', [FavoriteController::class, 'index'])
    ->name('favorite');

Route::get('/hunt', [GoHuntController::class, 'getHunt']);

Route::prefix('admin')
    ->middleware(['auth', 'admin'])
    ->group(function () {
        Route::get('/', [DashboardController::class, 'index'])
            ->name('dashboard');

        Route::resources([
            'user' => UserController::class,
            'tempatmakan' => FoodPlaceController::class,
            'gallery' => GalleryController::class,
            'review' => ReviewController::class,
            'favorite' => FavoriteAdminController::class,
            'category' => CategoryController::class,
        ]);
    });

Auth::routes(['verify' => true]);
