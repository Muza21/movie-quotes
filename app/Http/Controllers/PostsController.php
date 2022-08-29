<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;

class PostsController extends Controller
{
	public function index(): View
	{
		return view('posts');
	}
}
