<?php

namespace App\Infrastructure\Seeders;

use App\Infrastructure\Persistance\Auth\AuthEloquent;
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
        $auths = AuthEloquent::all();

        for ($i = 0; $i < count($auths); $i++) {
            DB::table('customers')->insert(
                [
                    'auth_id' => $auths[$i]->id,
                ],
            );
        }
    }
}
