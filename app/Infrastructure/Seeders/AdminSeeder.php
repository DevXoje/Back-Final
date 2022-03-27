<?php

namespace App\Infrastructure\Seeders;

use App\Infrastructure\Persistance\Auth\Admin\AdminEloquent;
use App\Infrastructure\Persistance\Auth\AuthEloquent;
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
        $auth = AuthEloquent::where('name', 'admin')->first();
        $admin = new AdminEloquent();
        $admin->auth_id = $auth->id;
        $admin->save();
    }
}
