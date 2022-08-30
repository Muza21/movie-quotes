<?php

use App\Http\Controllers\AdminPostsController;
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

Route::get('/', function () {
	return view('layout');
});

Route::get('/change-locale/{locale}', [LanguageController::class, 'change'])->name('locale.change');

Route::middleware(['guest'])->group(function () {
	Route::get('/admin/login', [LoginController::class, 'index'])->name('admin.index');
	Route::post('/admin/login', [LoginController::class, 'login'])->name('admin.login');
});

Route::get('/posts', [PostsController::class, 'index'])->name('quotes.posts');

Route::post('logout', [SessionsController::class, 'destroy'])->name('admin.logout')->middleware('auth');

Route::get('/admin/posts/manage', [AdminPostsController::class, 'index'])->name('admin.manage')->middleware('auth');
Route::get('/admin/posts/create', [AdminPostsController::class, 'create'])->name('admin.create')->middleware('auth');
Route::post('/admin/posts/create', [AdminPostsController::class, 'store'])->name('admin.post')->middleware('auth');
