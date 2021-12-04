<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\DetailsController;

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

Auth::routes();

Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/',[PagesController::class, 'index']);

//Post routes

Route::get('/blog',[PostsController::class, 'index']);

Route::get('/blog/create',[PostsController::class, 'create'])->middleware('auth');

Route::resource('/blog',PostsController::class);

//Details routes

Route::get('/details',[DetailsController::class, 'create'])->middleware('auth');
Route::post('/details',[DetailsController::class, 'store'])->middleware('auth');

//Route::resource('/details', DetailsController::class);