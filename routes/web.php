<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello/{user}', fn(string $user)=>"Hello, {$user}");

Route::get('/info', fn()=>"info page");

Route::get('/news', fn()=>"news");

Route::get('/news/{id}', fn(int $id)=>"news with id:{$id}");



