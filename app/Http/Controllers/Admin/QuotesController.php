<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\QuoteStoreRequest;
use App\Http\Requests\QuoteUpdateRequest;
use App\Models\Quote;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class QuotesController extends Controller
{
	public function index(): View
	{
		// ddd(Post::all());
		return view('admin.posts.manage-quotes', [
			'posts' => Quote::all(),
		]);
	}

	public function store(QuoteStoreRequest $request): RedirectResponse
	{
		$attributes = $request->validated();

		Quote::create([
			'quote'       => $attributes['quote'],
			'slug'        => $attributes['slug'],
			'movie_id'    => $attributes['title_id'],
			'thumbnail'   => request()->file('thumbnail')->store('thumbnails'),
		]);

		return redirect('/');
		// ->with('success', 'Successfuly added');
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
		// dd($post);
		$post->update([
			'quote'       => $attributes['quote'],
			'slug'        => $attributes['slug'],
			'movie_id'    => $attributes['title_id'],
			'thumbnail'   => $attributes['thumbnail'],
		]);

		return redirect('/');
	}

	public function destroy($id): RedirectResponse
	{
		Quote::find($id)->delete();
		return redirect(route('manage.quote'))->with('success', 'Successfully Deleted');
	}
}
