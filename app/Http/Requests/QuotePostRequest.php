<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
			// 'category_id'           => 'required|exists:categories,id',
		];
	}
}
