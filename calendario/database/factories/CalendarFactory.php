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
        /*$course = Course::all();
        $professor = Professor::all();

        return [
            "professor_mec" => $this->faker->randomElement($professor),
            "calendar_name" => $this->faker->name(),
            "academic_year" => AcademicYear::factory()->create()->id,
            "evaluation_season" => $this->faker->name(),
            "course_id" => $this->faker->randomElement($course),
            "start_date" => $this->faker->dateTime(),
            "end_date" => $this->faker->dateTime(),

        ];*/

        $course = Course::all();

        return [
            "course_id" => $this->faker->randomElement($course),
            "epoca_id" => Epoca::factory()->create()->id,
        ];
    }
}
