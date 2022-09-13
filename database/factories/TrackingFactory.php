<?php

namespace Database\Factories;

use App\Enums\TrackingPriority;
use App\Enums\TrackingStatus;
use Illuminate\Database\Eloquent\Factories\Factory;

class TrackingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        // dd(TrackingPriority::random());
        return [
            //
            'title' => $this->faker->sentence(4),
            'description' => $this->faker->paragraph(1),
            'priority' => TrackingPriority::random(),
            'status' => TrackingStatus::random(),
            'pr_id' => rand(1, 150),
        ];
    }
}
