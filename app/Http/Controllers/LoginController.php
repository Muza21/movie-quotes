<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserLoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
	public function login(UserLoginRequest $request): RedirectResponse
	{
		$validation = $request->validated();
		if (!auth()->attempt($validation))
		{
			throw ValidationException::withMessages([
				'email'=> 'Your provided credentials could not be identified.',
			]);
		}

		return redirect('/');
	}
}
