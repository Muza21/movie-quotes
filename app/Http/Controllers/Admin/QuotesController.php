<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\QuoteStoreRequest;
use App\Http\Requests\QuoteUpdateRequest;
use App\Models\Post;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class QuotesController extends Controller
{
	public function index(): View
	{
		// ddd(Post::all());
		return view('admin.posts.manage-quotes', [
			'posts' => Post::all(),
		]);
	}

	public function store(QuoteStoreRequest $request): RedirectResponse
	{
		$attributes = $request->validated();

		Post::create([
			'quote'       => $attributes['quote'],
			'slug'        => $attributes['slug'],
			'category_id' => $attributes['title_id'],
			'thumbnail'   => request()->file('thumbnail')->store('thumbnails'),
		]);

		return redirect('/');
		// ->with('success', 'Successfuly added');
	}

	public function edit($id): View
	{
		return view('admin.posts.edit-quote', [
			'quote' => Post::all()->find($id),
		]);
	}

	public function update(QuoteUpdateRequest $request, Post $post): RedirectResponse
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

		Post::create([
			'quote'       => $attributes['quote'],
			'slug'        => $attributes['slug'],
			'category_id' => $attributes['title_id'],
			'thumbnail'   => $attributes['thumbnail'],
		]);

		return redirect('/');
	}

	public function destroy($id): RedirectResponse
	{
		Post::find($id)->delete();
		return redirect(route('manage.quote'))->with('success', 'Successfully Deleted');
	}
}
