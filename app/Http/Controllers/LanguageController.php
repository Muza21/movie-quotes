<?php

namespace App\Http\Controllers;

class LanguageController extends Controller
{
	public function change(string $locale)
	{
		if (in_array($locale, config('app.available_locales')))
		{
			session()->put('lang', $locale);
		}
		else
		{
			session()->put('lang', 'en');
		}
		return redirect()->back();
	}
}
