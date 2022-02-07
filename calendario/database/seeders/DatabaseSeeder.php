<?php

namespace Database\Seeders;

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
        //$this->call(CourseSeeder::class);
        //$this->call(TimeSlotSeeder::class);

        //para isto funcionar perciso de importar o csv primeiro
        \App\Models\Calendar::factory(10)->create();
        \App\Models\EvaluationSlot::factory(10)->create();

    }
}
