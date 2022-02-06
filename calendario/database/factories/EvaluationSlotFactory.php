<?php

namespace Database\Factories;

use App\Models\Classroom;
use App\Models\Professor;
use App\Models\Subject;
use App\Models\TimeSlot;
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
        $subject = Subject::all();
        $professor = Professor::all();
        $classroom = Classroom::all();
        $time = TimeSlot::all();

        return [
            "day" => $this->faker->date(),
            "subject" => $this->faker->randomElement($subject),
            "associated_professor" => $this->faker->randomElement($professor),
            "observing_professor" =>$this->faker->randomElement($professor),
            "classroom" => $this->faker->randomElement($classroom),
            "time_slot" => $this->faker->randomElement($time),
        ];
    }
}
