<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AcademicYearFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "academic_year" => $this->faker->name(),
            "evaluation_season" => $this->faker->name()
        ];
    }
}
