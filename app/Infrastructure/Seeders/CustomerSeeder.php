<?php

namespace App\Infrastructure\Seeders;

use App\Infrastructure\Persistance\Auth\AuthEloquent;
use App\Infrastructure\Persistance\Auth\Customer\CustomerEloquent;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $auth = AuthEloquent::where('name', 'customer')->first();
        $customer = new CustomerEloquent();
        $customer->auth_id = $auth->id;
    }
}
