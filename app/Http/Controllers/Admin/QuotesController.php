<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\QuotePostRequest;
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

	public function store(): RedirectResponse
	{
		ddd(request()->all());
		// ddd($request->validated());

		// $attributes = $request->validated();
		// $attributes = $attributes + ['category_id' => request()->title_id];
		// ddd($attributes);
		// $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');
		// Post::create($attributes);

		return redirect('/');
		// ->with('success', 'Successfuly added');
	}

	public function edit($id): View
	{
		return view('admin.posts.edit-quote', [
			'quote' => Post::all()->find($id),
		]);
	}

	public function update(QuotePostRequest $request, Post $post)
	{
		$attributes = $request->validated();
		// ddd($attributes);
		$post->update([
			'title'        => $attributes['title'],
			'slug'         => $attributes['slug'],
		]);

		return redirect('/');
	}

	public function destroy($id)
	{
		Post::find($id)->delete();
		return redirect(route('manage.quote'))->with('success', 'Successfully Deleted');
	}
}
