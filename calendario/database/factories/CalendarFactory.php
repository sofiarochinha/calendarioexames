<?php

namespace Database\Factories;

use App\Models\AcademicYear;
use App\Models\Course;
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
            "professor_mec" => $this->faker->unique()->numberBetween(1,100),
            "calendar_name" => $this->faker->name(),
            "academic_year" => AcademicYear::factory()->create()->id,
            "evaluation_season" => $this->faker->name(),
            "course_id" => $this->faker->randomElement($course),
            "start_date" => $this->faker->dateTime(),
            "end_date" => $this->faker->dateTime()
        ];
    }
}
