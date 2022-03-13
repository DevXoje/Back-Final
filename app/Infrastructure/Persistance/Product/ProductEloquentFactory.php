<?php

namespace App\Infrastructure\Persistance\Product;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductEloquentFactory extends Factory
{
	/**
	 * The name of the factory's corresponding model.
	 *
	 * @var string
	 */
	protected $model = ProductEloquent::class;
	/**
	 * Define the model's default state.
	 *
	 * @return array
	 */
	public function definition()
	{
		return [
			'name' => $this->faker->unique()->word,
			'description' => $this->faker->paragraph(1),
			//'image' => $this->faker->image('public/storage/images', 640, 480, null, false),
			'image' => "pathImg",
			'price' => $this->faker->randomFloat(2, 0, 10000),
		];
	}

	/**
	 * Indicate that the model's email address should be unverified.
	 *
	 * @return \Illuminate\Database\Eloquent\Factories\Factory
	 */
	/* public function unverified()
	{
		return $this->state(function (array $attributes) {
			return [
				'email_verified_at' => null,
			];
		});
	} */
}
