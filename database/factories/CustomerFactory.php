<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $user=User::factory()->create();
        $order1= new Order(['customer_id'=>$user->id]);
        $order2= new Order(['customer_id'=>$user->id]);
        $order1->save();
        $order2->save();
        return [
            'id' => $user->id,
            'address' => $this->faker->unique()->address(),
        ];
    }
}
