<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Contracts\View\View;

class PostsController extends Controller
{
	public function index(): View
	{
		$posts = Post::get();
		return view('posts', [
			'posts' => $posts,
		]);
	}

	public function show(Post $post): View
	{
		// here needs fixing
		$random = rand(Category::all()->first()->id, Category::all()->count());
		// ddd($random);
		// ddd(Post::all()->first()->category);

		$post = Post::all()->find($random);
		return view('layout', [
			'post' => $post,
		]);
	}
}
