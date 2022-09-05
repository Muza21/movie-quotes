<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\QuoteStoreRequest;
use App\Http\Requests\QuoteUpdateRequest;
use App\Models\Movie;
use App\Models\Quote;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class QuotesController extends Controller
{
	public function index(): View
	{
		return view('admin.posts.manage-quotes', [
			'posts' => Quote::all(),
		]);
	}

	public function movie($id)
	{
		// ddd(Movie::all()->find($id)->quotes);
		return view('admin.posts.manage-quotes', [
			'posts'        => Movie::all()->find($id)->quotes,
			'currentMovie' => Movie::all()->find($id),
		]);
	}

	public function store(QuoteStoreRequest $request): RedirectResponse
	{
		$attributes = $request->validated();

		Quote::create([
			'quote'        => [
				'en' => $attributes['quote_en'],
				'ka' => $attributes['quote_ka'],
			],
			'movie_id'    => $attributes['title_id'],
			'thumbnail'   => request()->file('thumbnail')->store('thumbnails'),
		]);

		return redirect('/')->with('success', 'Successfully Created');
	}

	public function edit($id): View
	{
		return view('admin.posts.edit-quote', [
			'quote' => Quote::all()->find($id),
		]);
	}

	public function update(QuoteUpdateRequest $request, Quote $post): RedirectResponse
	{
		$attributes = $request->validated();

		if (!isset($attributes['thumbnail']))
		{
			$attributes['thumbnail'] = $post->thumbnail;
		}
		else
		{
			$attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');
		}
		$post->update([
			'quote'        => [
				'en' => $attributes['quote_en'],
				'ka' => $attributes['quote_ka'],
			],
			'movie_id'    => $attributes['title_id'],
			'thumbnail'   => $attributes['thumbnail'],
		]);

		return redirect('/')->with('success', 'Successfully Updated');
	}

	public function destroy($id): RedirectResponse
	{
		Quote::find($id)->delete();
		return redirect(route('manage.quote'))->with('success', 'Successfully Deleted');
	}
}
