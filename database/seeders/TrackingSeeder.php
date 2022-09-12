<?php

namespace Database\Seeders;

use App\Models\Tracking;
use Database\Factories\TrackingFactory;
use Illuminate\Database\Seeder;

class TrackingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Tracking::factory(50)->create();
    }
}
