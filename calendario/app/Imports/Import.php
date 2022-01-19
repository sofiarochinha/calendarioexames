<?php

namespace App\Imports;

use App\Models\Classroom;
use App\Models\Professor;
use App\Models\Subject;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class Import implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        foreach ($collection as $row)
        {
            Professor::firstOrCreate([
                'name' => $row[8],
                'email' => $row[9]
            ]);

            $classroom = $row[10];
            $array = explode(" ", $classroom);

            Classroom::firstOrCreate([
                'classroom' => $array[0],
                'type' => $array[1]
            ]);

            Subject::firstOrCreate([
                'name' => $row[0],
                'abbreviation' => $row[1],
                'subject_id' => $row[2],
                'associated_professor' => Professor::where('name', $row[8])->firstOrFail()->id
            ]);


        }
    }
}
