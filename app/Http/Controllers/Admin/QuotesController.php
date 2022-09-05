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
			'quotes' => Quote::paginate(30),
		]);
	}

	public function movie(Movie $movie)
	{
		return view('admin.posts.manage-quotes', [
			'quotes'        => $movie->quotes,
			'currentMovie'  => $movie,
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

	public function edit(Quote $quote): View
	{
		return view('admin.posts.edit-quote', [
			'quote' => $quote,
		]);
	}

	public function update(QuoteUpdateRequest $request, Quote $quote): RedirectResponse
	{
		$validation = $request->validated();

		if (!isset($validation['thumbnail']))
		{
			$validation['thumbnail'] = $quote->thumbnail;
		}
		else
		{
			$validation['thumbnail'] = request()->file('thumbnail')->store('thumbnails');
		}
		$quote->update([
			'quote'        => [
				'en' => $validation['quote_en'],
				'ka' => $validation['quote_ka'],
			],
			'movie_id'    => $validation['title_id'],
			'thumbnail'   => $validation['thumbnail'],
		]);

		return redirect(route('manage.quote'))->with('success', 'Successfully Updated');
	}

	public function destroy(Quote $quote): RedirectResponse
	{
		$quote->delete();
		return redirect(route('manage.quote'))->with('success', 'Successfully Deleted');
	}
}
