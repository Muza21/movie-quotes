<?php

namespace App\Http\Controllers;

use App\Models\Post;

class AdminPostsController extends Controller
{
	public function index()
	{
		return view('admin.posts.index', [
			'posts' => Post::paginate(50),
		]);
	}
}
