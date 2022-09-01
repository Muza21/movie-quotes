<?php

namespace App\Http\Controllers;

use App\Models\Post;

class RandomPostController extends Controller
{
	public function getRandomPost()
	{
		$post = Post::inRandomOrder()->first();
		return redirect()->route('random.post', ['id' => $post->id]);
	}
}
