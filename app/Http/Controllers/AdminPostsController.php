<?php

namespace App\Http\Controllers;

use App\Http\Requests\QuotePostRequest;
use App\Models\Post;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class AdminPostsController extends Controller
{
	public function index(): View
	{
		return view('admin.posts.index', [
			'posts' => Post::paginate(50),
		]);
	}

	public function create(): View
	{
		return view('create');
	}

	public function store(QuotePostRequest $request): RedirectResponse
	{
		$attributes = $request->validate([
			'title'                 => 'required',
			'slug'                  => 'required',
			'category_id'           => 'required',
			'quote'                 => 'required',
			'thumbnail'             => ['required', 'image'],
		]);

		$attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');
		Post::create([
			'title'        => $attributes['title'],
			'slug'         => $attributes['slug'],
			'category_id'  => $attributes['category_id'],
			'quote'        => $attributes['quote'],
			'thumbnail'    => $attributes['thumbnail'],
		]);

		return redirect('/posts');
	}
}
