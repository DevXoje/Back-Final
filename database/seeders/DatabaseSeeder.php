<?php

namespace Database\Seeders;

use App\Infrastructure\Seeders\{AdminSeeder, AuthSeeder, CartSeeder, CategorySeeder, CustomerSeeder, OrderSeeder, ProductSeeder};
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
      // Access
      AuthSeeder::class,
      AdminSeeder::class,
      CustomerSeeder::class,
      //Items
      CategorySeeder::class,
      ProductSeeder::class,
      //ProductCategorySeeder::class,//Por hacer
      // Sell
      //CartSeeder::class,
      //OrderSeeder::class
    ]);
  }
}
