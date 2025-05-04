<?php

namespace App\Services;

use App\Classes\TemuTricksKeywords;
use App\Classes\CarsharingTipsKeywords;
use App\Classes\ErrorFaresKeywords;
use Illuminate\Support\Str;

class ChatResponderService
{
    /**
     * Service fő feladatai lesznek:
     * 1. Kis és nagy betük, ékezetek, írásjelek kezelése >> kis-nagy betü ékezeteseknél minden verzióban legyen!
     * 2. Kulcsszavak (keywords) egyezések vizsgálata, számlálása,
     * 3. A "nyertes számláló" alapján pedig --> Visszaküldeni a "response_family" értékét.
     * 4. Holtverseny/küszöb értékek esetén meg kezelni a "hibát".
     */

    public function responed(string $message): string
    {
        // Számlálók, rajthoz!
        $matches = [
            'Temu Tricks'       => 0,
            'Carsharing Tips'   => 0,
            'Error Fares'       => 0,
        ];

        $message = Str::lower($message, 'UTF-8');

        // main engine
        foreach (TemuTricksKeywords::keywords() as $word) {
            if (Str::contains($message, Str::lower($word, 'UTF-8'))) $matches['Temu Tricks']++;
        }
        foreach (CarsharingTipsKeywords::keywords() as $word) {
            if (Str::contains($message, Str::lower($word, 'UTF-8'))) $matches['Carsharing Tips']++;
        }
        foreach (ErrorFaresKeywords::keywords() as $word) {
            if (Str::contains($message, Str::lower($word, 'UTF-8'))) $matches['Error Fares']++;
        }
        $max = max($matches);
        $maxKereses = array_count_values($matches)[$max] ?? 0;

        if ($maxKereses === 0 || $maxKereses > 1) {
            return 'Elnézésedet kérem a kellemetlenségért, de nem egészen értem. Megtennéd, hogy kicsit bővebben kifejted, hogy biztosan a jó megoldást küldhessem el?';
        }
        // Visszaadjuk a legnagyobbat és Annak a nevét || A true a Strict megkötése, szigoruan veszi!
        return array_search($max, $matches, true);
    }
}
