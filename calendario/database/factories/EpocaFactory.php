<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class EpocaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'start_date' => $this->faker->date,
            'end_date' => $this->faker->date
        ];
    }
}
