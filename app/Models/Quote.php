<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quote extends Model
{
	use HasFactory;

	protected $guarded = [];

	//This is post that has one category(movie)
	public function movie()
	{
		return $this->belongsTo(Movie::class);
	}
}
