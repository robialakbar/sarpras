<?php

use App\Setting;

if (!function_exists('Ribuan')) {
    function Ribuan($angka)
    {
        if (!is_numeric($angka)) {
            return $angka;
        }

        if ($angka == 0 | empty($angka)) {
            $ribuan = 0;
        } else {
            $ribuan = number_format(round($angka, 0, PHP_ROUND_HALF_UP), 0, ',', '.');
        }

        return $ribuan;
    }
}

function getSetting()
{
    return Setting::first();
}
