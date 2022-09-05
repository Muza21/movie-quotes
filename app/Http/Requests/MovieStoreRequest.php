<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class MovieStoreRequest extends FormRequest
{
	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array<string, mixed>
	 */
	public function rules()
	{
		// if slug is not updated it gives an error, so it needs ignore rule
		return [
			'title_en' => 'required',
			'title_ka' => 'required',
		];
	}
}