<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Movie;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
	/**
	 * Define the model's default state.
	 *
	 * @return array<string, mixed>
	 */
	public function definition()
	{
		return [
			'category_id'    => Category::factory(),
			'title_id'       => Movie::factory(),
			'slug'           => $this->faker->slug,
			'quote'          => $this->faker->sentence(),
		];
	}
}
