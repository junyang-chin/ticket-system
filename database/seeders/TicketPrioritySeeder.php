<?php

namespace Database\Seeders;

use App\Enums\TicketPriority as EnumsTicketPriority;
use App\Enums\TicketStatus;
use App\Models\TicketPriority;
use Illuminate\Database\Seeder;

class TicketPrioritySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        foreach (EnumsTicketPriority::$priorities as $key => $name) {
            TicketPriority::create(['priority' => $key, 'name' => $name],);
        }
    }
}
