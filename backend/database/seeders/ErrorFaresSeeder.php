<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ErrorFaresSeeder extends Seeder
{

    public function run(): void
    {
        $errorfares_Keywords = [
            'response_family' => 'Error Fares',
            'keywords' => ["Hibás", "árak", "utazás", "hol", "repülés", "vezetés", "európa", "USA", "Kedvezmény", "akció"],
            'min-match' => 2
        ];
    }
}
