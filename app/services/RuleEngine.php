<?php

namespace App\Services;

class RuleEngine
{
    public function diagnose(array $inputGejala)
    {
        $rules = include app_path('Data/rules.php');
        $penyakit = include app_path('Data/penyakit.php');

        $skor = [];

        foreach ($rules as $kodePenyakit => $gejalaRule) {
            $cocok = count(array_intersect($inputGejala, $gejalaRule));
            $skor[$kodePenyakit] = $cocok;
        }

        arsort($skor);
        $kodeTerpilih = array_key_first($skor);

        return $penyakit[$kodeTerpilih];
    }
}
