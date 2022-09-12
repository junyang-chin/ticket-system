<?php

namespace Database\Factories;

use App\Enums\TicketStatus;
use Illuminate\Database\Eloquent\Factories\Factory;

class TicketFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'user_id' => rand(3,22),
            'category_id' => rand(1,3),
            'title' => $this->faker->sentence(),
            'description'=> $this->faker->paragraph(3, true),
            'status' => TicketStatus::random(),
            'comment' => $this->faker->sentence(10),
            'tracking_id' => rand(1,50),
        ];
    }
}
