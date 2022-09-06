<?php

use App\Http\Controllers\Admin\MoviesController;
use App\Http\Controllers\Admin\QuotesController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\SessionsController;
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

Route::get('/', [PostsController::class, 'index'])->name('random.quote');

Route::get('/change-locale/{locale}', [LanguageController::class, 'change'])->name('locale.change');

Route::get('/movie/{movie}', [PostsController::class, 'show'])->name('movie.quotes');

Route::middleware(['guest'])->group(function () {
	Route::view('login', 'login')->name('admin.index');
	Route::post('login', [LoginController::class, 'login'])->name('admin.login');
});

Route::middleware(['auth'])->group(function () {
	Route::resource('movies', MoviesController::class);

	Route::get('/quote/manage/{movie}', [QuotesController::class, 'movie'])->name('see.quotes');
	Route::resource('quote', QuotesController::class);

	Route::post('logout', [SessionsController::class, 'logout'])->name('admin.logout');
});
