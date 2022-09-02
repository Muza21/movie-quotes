<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MoviePostRequest;
use App\Models\Category;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class MoviesController extends Controller
{
	public function index(): View
	{
		return view('admin.posts.manage-movies', [
			'posts' => Category::paginate(50),
		]);
	}

	public function store(MoviePostRequest $request): RedirectResponse
	{
		$attributes = $request->validated();
		Category::create([
			'title'        => $attributes['title'],
			'slug'         => $attributes['slug'],
		]);

		return redirect('/');
	}

	public function edit($category): View
	{
		return view('admin.posts.edit-movie', [
			'movie' => Category::all()->find($category),
		]);
	}

	public function update(MoviePostRequest $request, Category $category)
	{
		$attributes = $request->validated();
		$category->update([
			'title'        => $attributes['title'],
			'slug'         => $attributes['slug'],
		]);

		return redirect('/');
	}
}
