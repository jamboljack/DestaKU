<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

function Terbilang($x)
{
    $abil = array(
        '0'  => "",
        '1'  => "Satu",
        '2'  => "Dua",
        '3'  => "Tiga",
        '4'  => "Empat",
        '5'  => "Lima",
        '6'  => "Enam",
        '7'  => "Tujuh",
        '8'  => "Delapan",
        '9'  => "Sembilan",
        '10' => "Sepuluh",
        '11' => "Sebelas");

    if ($x < 12) {
        return "" . $abil[$x];
    } elseif ($x < 20) {
        return Terbilang($x - 10) . " Belas ";
    } elseif ($x < 100) {
        return Terbilang($x / 10) . " Puluh " . Terbilang($x % 10);
    } elseif ($x < 200) {
        return " Seratus " . Terbilang($x - 100);
    } elseif ($x < 1000) {
        return Terbilang($x / 100) . " Ratus " . Terbilang($x % 100);
    } elseif ($x < 2000) {
        return " Seribu " . Terbilang($x - 1000);
    } elseif ($x < 1000000) {
        return Terbilang($x / 1000) . " Ribu " . Terbilang($x % 1000);
    } elseif ($x < 1000000000) {
        return Terbilang($x / 1000000) . " Juta " . Terbilang($x % 1000000);
    }
}
