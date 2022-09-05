<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Quote;
use Illuminate\Contracts\View\View;

class PostsController extends Controller
{
	public function index(): View
	{
		return view('layout', [
			'quote' => Quote::inRandomOrder()->first(),
		]);
	}

	public function show(Movie $movie): View
	{
		return view('quotes', [
			'quotes'        => $movie->quotes,
			'movie'         => $movie,
		]);
	}
}
