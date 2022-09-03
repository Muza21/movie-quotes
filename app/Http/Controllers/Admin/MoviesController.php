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
			'posts' => Movie::paginate(50),
		]);
	}

	public function store(MovieStoreRequest $request): RedirectResponse
	{
		$attributes = $request->validated();
		Movie::create([
			'title'        => $attributes['title'],
			'slug'         => $attributes['slug'],
		]);

		return redirect('/');
	}

	public function edit($id): View
	{
		return view('admin.posts.edit-movie', [
			'movie' => Movie::all()->find($id),
		]);
	}

	public function update(MovieStoreRequest $request, $id): RedirectResponse
	{
		$attributes = $request->validated();
		Movie::find($id)->update($attributes);

		return redirect(route('manage.movies'))->with('success', 'Successfully Updated');
	}

	public function destroy($id): RedirectResponse
	{
		Movie::find($id)->delete();
		return redirect(route('manage.movies'))->with('success', 'Successfully Deleted');
	}
}
