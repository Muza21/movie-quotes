<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Contracts\View\View;

class PostsController extends Controller
{
	public function index(): View
	{
		$post = Post::inRandomOrder()->first();

		return view('layout', [
			'post' => $post,
		]);
	}

	public function show($category)
	{
		return view('quotes', [
			'quotes'        => Category::all()->find($category)->posts,
			'movie'         => Category::all()->find($category),
		]);
	}
}
