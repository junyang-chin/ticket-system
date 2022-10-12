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
            'adnexio' => 'Adnexio',
            'meniaga' => 'Meniaga',
            'decoris' => 'Decoris',
        ];

        foreach ($categories as $category => $name) {
            Category::create(['category' => $category, 'name' => $name]);
        }
    }
}
