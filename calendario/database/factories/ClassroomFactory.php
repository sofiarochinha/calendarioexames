<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ClassroomFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "classroom" => $this->faker->unique()->postcode(),
            "capacity" => $this->faker->numberBetween(1,30),
            "type" => $this->faker->name()
        ];
    }
}
