<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TemuSeeder extends Seeder
{

    public function run(): void
    {
        $temuTricks_Keywords = [
            'response_family' => 'Temu Tricks',
            'keywords' => [200,"200%","200 %","Kredit","kredit visszatérítés","kredit-visszatérítés","kredit visszaterites","kredit-visszaterites","Kupon","akció"],
            'min-match' => 2
        ];
    }
}
