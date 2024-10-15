<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use phpDocumentor\Reflection\Location;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'location' => fake()->address(),
            'details' => fake()->sentence(),
            'date' => fake()->date(),
            'time' => fake()->time(),
        ];
        //'name', 'location', 'details', 'date', 'time'
    }
}
