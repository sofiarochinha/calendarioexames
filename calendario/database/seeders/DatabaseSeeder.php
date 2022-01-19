<?php

namespace Database\Seeders;

use App\Models\AcademicYear;
use App\Models\Course;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         //chama o seeder
        $this->call(TimeSlotSeeder::class);

        //coloca dados alteatórios na base de dados consoante o seu tipo
        Course::factory(10)->create();
        AcademicYear::factory(10)->create();
    }
}
