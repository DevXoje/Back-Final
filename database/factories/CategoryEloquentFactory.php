<?php

namespace App\Infrastructure\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryEloquentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word,
            'image' => $this->faker->imageUrl(200, 200),
        ];
    }
}
