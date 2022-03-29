<?php

use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\IndexController as AdminIndexController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\WelcomeController;
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


Route::get('/', [NewsController::class, 'welcome'])
    ->name('welcome');
Route::get('/news', [NewsController::class, 'index'])
    ->name('news');
Route::get('/news/{id}', [NewsController::class, 'show'])
    ->where('id', '\d+')
    ->name('news.show');
Route::get('/categories', [CategoryController::class, 'index'])
    ->name('categories');
Route::get('/categories/{id}', [CategoryController::class, 'show'])
    ->where('id', '\d+')
    ->name('categories.show');
Route::resource('/feedback', FeedbackController::class)
    ->name('index', 'feedback');
Route::resource('/order', OrderController::class)
    ->name('index', 'order');


// Admin Routes

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function(){
    Route::resource('categories', AdminCategoryController::class);
    Route::resource('news', AdminNewsController::class);
    Route::get('/', AdminIndexController::class)->name('index');
});

