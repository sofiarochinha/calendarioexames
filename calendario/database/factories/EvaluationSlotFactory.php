<?php

namespace Database\Factories;

use App\Models\Classroom;
use App\Models\Professor;
use App\Models\Subject;
use Illuminate\Database\Eloquent\Factories\Factory;

class EvaluationSlotFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $subject = Subject::factory()->create();
        $professor = Professor::factory()->create();
        $classroom = Classroom::factory()->create();

        return [
            "day" => $this->faker->date(),
            "subject" => $subject->id,
            "associated_professor" => $professor->id,
            "observing_professor" => $professor->id,
            "classroom" => $classroom->id,
            "time_slot" => $this->faker->numberBetween(1,3),
        ];
    }
}
