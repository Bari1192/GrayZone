<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CarsharingSeeder extends Seeder
{

    public function run(): void
    {
        $carsharingTips_Keywords = [
            'response_family' => 'Carsharing Tips',
            'keywords' => ["auto", "megosztó", "greengo", "green go", "kredit", "bónusz", "mikor", "mennyi", "vezetes", "akció"],
            'min-match' => 2
        ];
    }
}
