<?php

namespace Database\Factories;

use App\Models\AcademicYear;
use App\Models\Course;
use App\Models\Epoca;
use App\Models\Professor;
use Illuminate\Database\Eloquent\Factories\Factory;

class CalendarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $course = Course::all();

        return [
            "course_id" => $this->faker->randomElement($course),
            "epoca_id" => Epoca::factory()->create()->id,
        ];
    }
}
