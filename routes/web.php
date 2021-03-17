<?php

use App\Http\Controllers\Admin\IndexController as AdminIndexController;
use App\Http\Controllers\IndexController as HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\News\CategoryController;
use App\Http\Controllers\News\IndexController as NewsIndexController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\Admin\NewsCategoryController as AdminNewsCategoryController;

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

Route::name('news.')->prefix('/news')->group(function () {
    Route::get('/category', [CategoryController::class, 'index'])->name('category.index');
    Route::get('/category/{slug}', [CategoryController::class, 'view'])->name('category.view');

    Route::get('/', [NewsIndexController::class, 'index'])->name('index');
    Route::get('/{news}', [NewsIndexController::class, 'view'])
        ->name('view')
        ->where('id', '[0-9]+');
});

Route::name('admin.')
    ->prefix('/admin')
    ->middleware(['auth', 'is_admin'])
    ->group(function () {
        Route::get('/', [AdminIndexController::class, 'index'])->name('index');
        Route::get('/users', [AdminIndexController::class, 'users'])->name('users');
        Route::post('/set-admin', [AdminIndexController::class, 'setAdmin'])->name('set-admin');

        Route::resource('news', AdminNewsController::class)->except('show');
        Route::prefix('news')->name('news.')->group(function () {
            Route::resource('category', AdminNewsCategoryController::class)->except('show');
        });
    });

Route::name('users.')
    ->prefix('/users')
    ->middleware('auth')
    ->group(function () {
        Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
        Route::post('/profile', [ProfileController::class, 'save'])->name('profile.save');
    });

Auth::routes();
