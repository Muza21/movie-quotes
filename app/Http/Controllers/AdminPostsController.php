<?php

namespace App\Http\Controllers;

use App\Http\Requests\MoviePostRequest;
use App\Http\Requests\QuotePostRequest;
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

	public function store(QuotePostRequest $request): RedirectResponse
	{
		// ddd(request()->all());
		// ddd($request->validated());

		$attributes = $request->validated();
		$attributes = $attributes + ['category_id' => request()->title_id];
		// dd($attributes);
		$attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');
		Post::create($attributes);

		return redirect('/');
		// ->with('success', 'Successfuly added');
	}

	public function storeMovie(MoviePostRequest $request): RedirectResponse
	{
		$attributes = $request->validated();
		Category::create([
			'title'        => $attributes['title'],
			'slug'         => $attributes['slug'],
		]);

		return redirect('/');
	}

	public function edit(Post $post): View
	{
		return view('admin.posts.edit-movie', [
			'post' => $post,
		]);
	}
}
