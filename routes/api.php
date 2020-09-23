<?php

use App\Http\Controllers\Artist\AlbumController;
use App\Http\Controllers\Artist\ArtistController;
use App\Http\Controllers\Artist\SingleController;
use App\Http\Controllers\Artist\SongController;
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

Route::prefix('/artists')->group(function () {

    Route::get('/', [ArtistController::class, 'index']);

    Route::prefix('/{artist}')->group(function () {

        Route::get('/', [ArtistController::class, 'show']);

        Route::prefix('/albums')->group(function () {

            Route::get('/', [AlbumController::class, 'index']);

            Route::prefix('/{album}')->group(function () {

                Route::get('/', [AlbumController::class, 'show']);

                Route::prefix('/songs')->group(function () {

                    Route::get('/{song}', [SongController::class, 'show']);

                });

            });

        });

        Route::prefix('/singles')->group(function () {

            Route::get('/', [SingleController::class, 'index']);

        });

    });

});

Route::prefix('/albums')->group(function () {

    Route::get('/', [\App\Http\Controllers\AlbumController::class, 'index']);

    Route::prefix('/{album}')->group(function () {

        Route::get('/', [\App\Http\Controllers\AlbumController::class, 'show']);

    });

});

Route::prefix('/singles')->group(function () {

    Route::get('/', [\App\Http\Controllers\SingleController::class, 'index']);

    Route::prefix('/{single}')->group(function () {

        Route::get('/', [\App\Http\Controllers\SingleController::class, 'show']);

    });

});
