<?php

namespace App\Http\Controllers;

use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
	public function login()
	{
		return view('login');
	}

	public function posts()
	{
		$attributes = request()->validate([
			'email'    => 'required|email',
			'password' => 'required',
		]);

		if (!auth()->attempt($attributes))// auth failed.
		{
			throw ValidationException::withMessages([
				'email'=> 'Your provided credentials could not be identified.',
			]);

			// return back()
			//     ->withInput()
			//     ->withErrors(['email'=>'Your provided credentials could not be identified.']);
		}

		return redirect('posts')->with('success', 'Welcome Back!');
	}
}
