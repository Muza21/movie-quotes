<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\QuoteStoreRequest;
use App\Http\Requests\QuoteUpdateRequest;
use App\Models\Movie;
use App\Models\Quote;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\File;

class QuotesController extends Controller
{
	public function index(): View
	{
		return view('admin.posts.manage-quotes', [
			'quotes' => Quote::paginate(30),
		]);
	}

	public function filter(Movie $movie): View
	{
		return view('admin.posts.manage-quotes', [
			'quotes'        => $movie->quotes,
			'currentMovie'  => $movie,
		]);
	}

	public function store(QuoteStoreRequest $request): RedirectResponse
	{
		$validation = $request->validated();

		Quote::create([
			'quote'        => [
				'en' => $validation['quote_en'],
				'ka' => $validation['quote_ka'],
			],
			'movie_id'    => $validation['movie_id'],
			'thumbnail'   => request()->file('thumbnail')->store('thumbnails'),
		]);

		return redirect(route('quotes.index'))->with('success', 'Successfully Created');
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
			File::delete('storage/' . $quote->thumbnail);
			$validation['thumbnail'] = request()->file('thumbnail')->store('thumbnails');
		}
		$quote->update([
			'quote'        => [
				'en' => $validation['quote_en'],
				'ka' => $validation['quote_ka'],
			],
			'movie_id'    => $validation['movie_id'],
			'thumbnail'   => $validation['thumbnail'],
		]);

		return redirect(route('quotes.index'))->with('success', 'Successfully Updated');
	}

	public function destroy(Quote $quote): RedirectResponse
	{
		$quote->delete();
		return redirect(route('quotes.index'))->with('success', 'Successfully Deleted');
	}
}
