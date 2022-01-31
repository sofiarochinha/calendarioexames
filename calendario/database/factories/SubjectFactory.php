<?php

namespace Database\Factories;

use App\Models\Course;
use App\Models\Professor;
use Illuminate\Database\Eloquent\Factories\Factory;

class SubjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "name" => $this->faker->name(),
            "subject_code" => $this->faker->randomDigit(),
            "semester" => $this->faker->numberBetween(1,3),
            "professor_mec" => Professor::factory()->create()->mec,
            "course_id" => Course::factory()->create()->id
        ];
    }
}
