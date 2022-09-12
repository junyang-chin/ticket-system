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
            ['name' => 'adnexio'],
            ['name' => 'meniaga'],
            ['name' => 'decoris'],
        ];

        foreach ($categories as $category) {
            extract($category);
            Category::create(['name' => $name]);
        }
    }
}
