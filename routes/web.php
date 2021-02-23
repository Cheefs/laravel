<?php

use App\Http\Controllers\IndexController;
use App\Http\Controllers\NewsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsCategoryController;

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

Route::get('/', [IndexController::class, 'index'])->name('home');

Route::name('news')->prefix('news')->group(function () {
    Route::get('/', [NewsController::class, 'index']);

    Route::name('.')->group(function () {
        Route::get('/{id}', [NewsController::class, 'view'])
            ->name('view')
            ->where('id', '[0-9]+');

        Route::name('category')->prefix('category')->group(function () {
            Route::get('/', [NewsCategoryController::class, 'index']);

            Route::name('.')->group(function () {
                Route::get('{slug}', [NewsCategoryController::class, 'view'])->name('view');
            });
        });
    });
});
