<?php

namespace Database\Seeders;

use App\Infrastructure\Seeders\{AuthSeeder, CartSeeder, CategorySeeder, CustomerSeeder, OrderSeeder, ProductSeeder};
use App\Models\Order;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
  /**
   * Seed the application's database.
   *
   * @return void
   */
  public function run()
  {
    $this->call([
      CategorySeeder::class,
      ProductSeeder::class,
      AuthSeeder::class,
      CustomerSeeder::class,
      CartSeeder::class,
      OrderSeeder::class
    ]);
  }
}
