<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MoviesController;
use App\Http\Controllers\RegisterController;
use App\Models\Movie;

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

// root
Route::get('/', function () {
    return view('pages.front.dashboard', ['movies' => Movie::all()]);
});

// route main
Route::get('all', [MainController::class, 'frontAll'])->name('frontAll');
Route::get('all/{movie}/detail', [MainController::class, 'showDetail'])->name('showDetail');

// route admin
Route::get('dashboard', [MainController::class, 'dashboard'])->name('dashboard')->middleware('auth');
Route::get('dashboard/all', [MainController::class, 'dashboardAll'])->name('dashboardAll')->middleware('auth');

// route movies
Route::resource('movies', MoviesController::class)->middleware('auth');
Route::get('delete/{id}', [MoviesController::class, 'destroy'])->middleware('auth');

// route login
Route::resource('login', LoginController::class)->middleware('guest');

// route register
Route::resource('register', RegisterController::class)->middleware('guest');

// route logout
Route::post('logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');