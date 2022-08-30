<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;

class SessionsController extends Controller
{
	public function destroy(): RedirectResponse
	{
		auth()->logout();

		return redirect('/')->with('success', 'Goodbye!');
	}
}
