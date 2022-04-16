<?php

use App\Http\Controllers\Account\IndexController as AccountIndexController;
use App\Http\Controllers\Account\ProfileController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\IndexController as AdminIndexController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\Admin\ParserController;
use App\Http\Controllers\Admin\SourceController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Auth\SocialController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\NewsController;
use Illuminate\Support\Facades\Auth;
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
Route::get('/categories/{id}', [NewsController::class, 'showByCategory'])
    ->where('id', '\d+')
    ->name('categories.show');
Route::resource('/feedback', FeedbackController::class)
    ->name('index', 'feedback');

Route::group(['middleware' => 'auth'], function(){
    Route::group(['prefix' => 'account', 'as' => 'account.'], function(){
        Route::get('/', AccountIndexController::class)->name('index');
        Route::resource('profile', ProfileController::class);
        // logout
        Route::get('logout', function(){
            Auth::logout();
            return redirect()->route('login');
        })->name('logout');
    });
    // Admin Routes
    Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin.check'], function(){
        Route::resource('categories', AdminCategoryController::class);
        Route::resource('news', AdminNewsController::class);
        Route::resource('users', AdminUserController::class);
        Route::get('/', AdminIndexController::class)
            ->name('index');
        Route::resource('parser', ParserController::class);
        Route::resource('sources', SourceController::class);
    });
});

Route::group(['middleware' => 'guest'], function(){
    Route::get('/auth/{network}/redirect', [SocialController::class, 'index'])
        ->where('network', '\w+')
        ->name('auth.redirect');
    Route::get('/auth/{network}/callback', [SocialController::class, 'callback'])
        ->where('network', '\w+')
        ->name('auth.callback');
});




Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
