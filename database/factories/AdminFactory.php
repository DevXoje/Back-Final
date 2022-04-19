<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class AdminFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $user = User::factory()->create([
            'email' => 'admin@admin.com',
            'role' => 'admin',
        ]);

        return [
            'id' => $user->id,
            'is_super' => true,
        ];
    }
}
