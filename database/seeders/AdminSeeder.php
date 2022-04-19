<?php

namespace Database\Seeders;

use App\Models\{User, Admin};
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::factory()->count(1)->create();
    }
}
