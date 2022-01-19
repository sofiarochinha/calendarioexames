<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'course_id' => $this->faker->unique->randomDigit(),
            //somente tem cursos do 1 a 3 ano no máximo
            //é perciso distinguir o tipo de grau? ou tem sempre um id diferente?
            'course_years' => $this->faker->numberBetween(1,3)
        ];
    }
}
