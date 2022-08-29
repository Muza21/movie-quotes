<?php

namespace App\Http\Controllers;

use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
	public function index()
	{
		return view('login');
	}

	public function login()
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
