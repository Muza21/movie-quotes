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
	Route::get('/movies/manage', [MoviesController::class, 'index'])->name('manage.movies');
	Route::view('/movies', 'admin.posts.add-movie')->name('add.movie');
	Route::post('/movies/create', [MoviesController::class, 'store'])->name('post.movie');
	Route::get('/movies/{movie}/edit', [MoviesController::class, 'edit'])->name('edit.movie');
	Route::patch('/movies/{movie}', [MoviesController::class, 'update'])->name('update.movie');
	Route::delete('/movies/{movie}', [MoviesController::class, 'destroy'])->name('delete.movie');

	Route::get('/quote/manage', [QuotesController::class, 'index'])->name('manage.quote');
	Route::get('/quote/manage/{movie}', [QuotesController::class, 'movie'])->name('see.quotes');
	Route::view('/quote', 'admin.posts.add-quote')->name('create.quote');
	Route::post('/quote-create', [QuotesController::class, 'store'])->name('post.quote');
	Route::get('/quote/{quote}/edit', [QuotesController::class, 'edit'])->name('edit.quote');
	Route::patch('/quote/{quote}', [QuotesController::class, 'update'])->name('update.quote');
	Route::delete('/quote/{quote}', [QuotesController::class, 'destroy'])->name('delete.quote');

	Route::post('logout', [SessionsController::class, 'destroy'])->name('admin.logout');
});
