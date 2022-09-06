<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MovieStoreRequest;
use App\Models\Movie;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class MoviesController extends Controller
{
	public function index(): View
	{
		return view('admin.posts.manage-movies', [
			'movies' => Movie::paginate(30),
		]);
	}

	public function create(): View
	{
		return view('admin.posts.add-movie');
	}

	public function store(MovieStoreRequest $request): RedirectResponse
	{
		$attributes = $request->validated();

		Movie::create([
			'title'        => [
				'en' => $attributes['title_en'],
				'ka' => $attributes['title_ka'],
			],
		]);

		return redirect(route('movies.index'))->with('success', 'Successfully Created');
	}

	public function edit(Movie $movie): View
	{
		return view('admin.posts.edit-movie', [
			'movie' => $movie,
		]);
	}

	public function update(MovieStoreRequest $request, Movie $movie): RedirectResponse
	{
		$validation = $request->validated();
		$movie->update([
			'title'        => [
				'en' => $validation['title_en'],
				'ka' => $validation['title_ka'],
			],
		]);

		return redirect(route('movies.index'))->with('success', 'Successfully Updated');
	}

	public function destroy(Movie $movie): RedirectResponse
	{
		$movie->delete();
		return redirect(route('movies.index'))->with('success', 'Successfully Deleted');
	}
}
