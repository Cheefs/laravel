<?php

use App\Http\Controllers\IndexController as HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\News\CategoryController;
use App\Http\Controllers\News\IndexController as NewsIndexController;

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

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::name('news')->prefix('/news')->group(function () {
    Route::get('/', [NewsIndexController::class, 'index']);
    Route::get('/{id}', [NewsIndexController::class, 'view'])
        ->name('.view')
        ->where('id', '[0-9]+');
});

Route::name('news.category')->prefix('/news/category')->group(function () {
    Route::get('/', [CategoryController::class, 'index']);
    Route::get('/{slug}', [CategoryController::class, 'view'])->name('.view');
});
