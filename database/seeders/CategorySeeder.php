<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $categories = [
            ['code' => 'adx', 'name' => 'adnexio'],
            ['code' => 'mng', 'name' => 'meniaga'],
            ['code' => 'dcr', 'name' => 'decoris'],
        ];

        foreach ($categories as $category) {
            extract($category);
            Category::create(['code' => $code, 'name' => $name]);
        }
    }
}
