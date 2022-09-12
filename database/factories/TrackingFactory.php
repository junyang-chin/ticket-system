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
        return [
            //
            'title' => $this->faker->sentence(),
            'description' => $this->faker->paragraph(3, true),
            'priority' => TrackingPriority::random(),
            'status' => TrackingStatus::random(),
            'comment' => $this->faker->sentence(10),
            'pr_id' => $this->faker->rand(1,150),
        ];
    }
}
