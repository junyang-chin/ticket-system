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
            'category_id' => rand(1,3),
            'title' => $this->faker->sentence(4),
            'description'=> $this->faker->sentences(3,true),
            'status' => TicketStatus::random(),
            'comment' => null,
        ];
    }
}
