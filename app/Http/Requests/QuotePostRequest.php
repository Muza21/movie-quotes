<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuotePostRequest extends FormRequest
{
	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array<string, mixed>
	 */
	public function rules()
	{
		return [
			'slug'                  => 'required',
			'category_id'           => 'required',
			'quote'                 => 'required',
			'thumbnail'             => ['required', 'image'],
		];
	}
}
