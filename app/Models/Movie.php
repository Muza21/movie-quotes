<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
	use HasFactory;

	protected $guarded = [];

	//This is movies that has many posts(quotes)
	public function quotes()
	{
		return $this->hasMany(Quote::class);
	}
}
