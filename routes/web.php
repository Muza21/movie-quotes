<?php

use App\Http\Controllers\LanguageController;
use App\Http\Controllers\LoginController;
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

Route::get('/admin/login', [LoginController::class, 'index'])->name('locale.change')->middleware('guest');
Route::post('/admin/posts', [LoginController::class, 'login'])->name('locale.change')->middleware('guest');
