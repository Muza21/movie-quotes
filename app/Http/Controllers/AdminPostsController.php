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
}
