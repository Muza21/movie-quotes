<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserLoginRequest;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
	public function index(): View
	{
		return view('login');
	}

	public function login(UserLoginRequest $request): RedirectResponse
	{
		$validation = $request->validated();
		if (!auth()->attempt($validation))
		{
			throw ValidationException::withMessages([
				'email'=> 'Your provided credentials could not be identified.',
			]);
		}

		return redirect('posts')->with('success', 'Welcome Back!');
	}
}
