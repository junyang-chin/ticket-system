<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::insert(
            [
                [
                    'name'=>'admin',
                    'password'=>'admin',
                    'email'=>'admin@admin',
                    'level'=>'admin',
                ],
            ]
        );
        User::factory(100)->create();
    }
}
