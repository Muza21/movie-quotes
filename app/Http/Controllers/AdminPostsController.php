<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class AdminPostsController extends Controller
{
	public function index(): View
	{
		return view('admin.posts.index', [
			'posts' => Category::paginate(50),
		]);
	}

	public function quoteIndex(): View
	{
		return view('manage', [
			'posts' => Post::paginate(50),
		]);
	}

	public function store(): RedirectResponse
	{
		ddd(request()->all());

		// $attributes = $request->validated();
		$attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');
		Post::create([
			'slug'         => $attributes['slug'],
			'category_id'  => $attributes['category_id'],
			'quote'        => $attributes['quote'],
			'thumbnail'    => $attributes['thumbnail'],
		]);

		return redirect('/');
		// ->with('success', 'Successfuly added');
	}

	public function storeMovie(): RedirectResponse
	{
		$attributes = request()->all();
		ddd($attributes);
		Post::create([
			'title'        => $attributes['title'],
			'slug'         => $attributes['slug'],
		]);

		return redirect('/');
	}
}
