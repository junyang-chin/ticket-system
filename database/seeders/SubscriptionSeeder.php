<?php

namespace Database\Seeders;

use App\Models\Subscription;
use Illuminate\Database\Seeder;

class SubscriptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $data= [
            ['user_id'=> 1, 'category_id' => 1],
            ['user_id'=> 1, 'category_id' => 2],
            ['user_id'=> 1, 'category_id' => 3],
        ];
        Subscription::insert($data);
    }
}
