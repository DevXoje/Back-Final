<?php

namespace App\Infrastructure\Seeders;

use App\Infrastructure\Persistance\Category\CategoryEloquent;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 5; $i++) {
            DB::table('category')->insert(
                [
                    'name' => 'Category_' . $i + 1,
                    'image' => 'https://source.unsplash.com/random/?tech',
                    'description' => 'Description_' . $i + 1,
                ],
            );
        }
    }
}
