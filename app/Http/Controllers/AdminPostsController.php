<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Contracts\View\View;

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

	public function store()
	{
		// ddd(Post::get(['genre_id' => 2]));
		$attributes = request()->validate([
			'title'                 => 'required',
			'slug'                  => 'required',
			'category_id'           => 'required',
			'quote'                 => 'required',
			'thumbnail'             => ['required', 'image'],
		]);

		// ddd($attributes);
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
