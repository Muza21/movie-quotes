<?php

namespace App\Http\Controllers;

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
}
