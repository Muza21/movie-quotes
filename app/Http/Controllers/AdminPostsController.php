<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Contracts\View\View;
use Illuminate\Validation\Rule;

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
		ddd(request()->all());
		// Post::create(array_merge($this->validatePost(), [
		// 	'title'           =>
		// 	'thumbnail'       =>
		// 	'slug'            => ['required', Rule::unique('posts', 'slug')->ignore($post)],
		// 	'quote'           => 'required',
		// 	'genre'           => 'required',
		// ]));

		return redirect('/');
	}

	protected function validatePost(?Post $post = null): array
	{
		$post ??= new Post();

		return request()->validate([
			'title'           => 'required',
			'thumbnail'       => $post->exists ? ['image'] : ['required', 'image'],
			'slug'            => ['required', Rule::unique('posts', 'slug')->ignore($post)],
			'quote'           => 'required',
			'genre'           => 'required',
		]);
	}
}
