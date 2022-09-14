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
        User::create(
            [
                'name' => 'admin',
                'password' => 'admin',
                'email' => 'admin@email',
                'role' => 'admin',
            ]
        );

        User::create(
            [
                'name' => 'developer',
                'password' => 'dev',
                'email' => 'dev@email',
                'role' => 'developer',
            ]
        );
        
        foreach(User::factory(20)->create() as $user){
            $user->assignRole('user');
        }
    }
}
