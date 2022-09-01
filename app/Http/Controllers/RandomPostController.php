<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\RedirectResponse;

class RandomPostController extends Controller
{
	public function getRandomPost(): RedirectResponse
	{
		$post = Post::inRandomOrder()->limit(1)->get();
		return redirect()->route('random.post', ['id' => $post->id]);
	}
}
