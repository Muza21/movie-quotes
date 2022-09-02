<?php

use App\Http\Controllers\AdminPostsController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\SessionsController;
use App\Models\Category;
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

Route::middleware(['guest'])->group(function () {
	Route::view('login', 'login')->name('admin.index');
	Route::post('login', [LoginController::class, 'login'])->name('admin.login');
});

// Route::get('/posts', [PostsController::class, 'index'])->name('quotes.posts');

Route::get('/quotes/{category}', function (Category $category) {
	return view('quotes', [
		'quotes'        => Category::all()->find($category)->posts,
		'movie'         => Category::all()->find($category),
	]);
})->name('movie.quotes');

Route::middleware(['auth'])->group(function () {
	Route::get('/admin/movies/manage', [AdminPostsController::class, 'index'])->name('manage.movies');
	Route::view('/admin/movies', 'add-movie')->name('add.movie');
	Route::post('/admin/movies/create', [AdminPostsController::class, 'storeMovie'])->name('post.movie');
	Route::get('/admin/movies/{post}/edit', [AdminPostsController::class, 'edit'])->name('edit.movie');
	Route::patch('/admin/movies/{post}', [AdminPostsController::class, 'update'])->name('update.movie');

	Route::get('/admin/quote/manage', [AdminPostsController::class, 'quoteIndex'])->name('manage.quote');
	Route::view('/admin/quote', 'create')->name('create.quote');
	Route::post('/admin/quote-create', [AdminPostsController::class, 'store'])->name('post.quote');

	Route::post('logout', [SessionsController::class, 'destroy'])->name('admin.logout');
});

// Route::get('categories/{category}', function (Category $category) {
// 	return view('posts', [
// 		'posts' => $category->posts,
// 	]);
// });
