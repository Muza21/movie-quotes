<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Quote;
use Illuminate\Contracts\View\View;

class PostsController extends Controller
{
	public function index(): View
	{
		$post = Quote::inRandomOrder()->first();

		return view('layout', [
			'post' => $post,
		]);
	}

	public function show($id)
	{
		return view('quotes', [
			'quotes'        => Movie::all()->find($id)->quotes,
			'movie'         => Movie::all()->find($id),
		]);
	}
}
