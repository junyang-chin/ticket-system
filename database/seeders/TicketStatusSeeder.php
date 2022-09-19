<?php

namespace Database\Seeders;

use App\Enums\TicketStatus as EnumsTicketStatus;
use App\Enums\TrackingPriority;
use App\Models\TicketStatus;
use Illuminate\Database\Seeder;

class TicketStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        foreach (EnumsTicketStatus::$statuses as $status) {
            TicketStatus::create(['status' => $status]);
        }
    }
}
