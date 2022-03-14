<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TimeSlotSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('time_slot')->insert([
            'time_slot' => 'Manha'
        ]);

        DB::table('time_slot')->insert([
            'time_slot' => 'Tarde'
        ]);

        DB::table('time_slot')->insert([
            'time_slot' => 'Noite'
        ]);

    }
}
