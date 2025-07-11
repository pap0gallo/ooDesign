<?php

namespace App\L01\src\buildRange;

require __DIR__ . '/../../../vendor/autoload.php';

use Carbon\CarbonPeriod;

$data = [
    [ 'value' => 14, 'date' => '02.08.2018' ],
    [ 'value' => 43, 'date' => '03.08.2018' ],
    [ 'value' => 38, 'date' => '05.08.2018' ],
];

$begin = '2018-08-01';
$end = '2018-08-06';


function buildRange($data, $begin, $end)
{
    $result = [];
    $keyed = collect($data)->keyBy('date');

    $period = CarbonPeriod::create($begin, $end);
    foreach ($period as $date) {
        $formatted = $date->format('d.m.Y');
        $result[] = $keyed->has($formatted)
            ? $keyed[$formatted]
            : ['value' => 0, 'date' => $formatted];
    }
    return $result;
}

print_r(buildRange($data, $begin, $end));