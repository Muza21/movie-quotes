<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class QuotePostRequest extends FormRequest
{
	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array<string, mixed>
	 */
	public function rules()
	{
		return [
			'slug'                  => 'required',
			'quote'                 => 'required',
			'thumbnail'             => ['required', 'image'],
			'category_id'           => ['required', Rule::exists('categories', 'id')],
		];
	}
}
