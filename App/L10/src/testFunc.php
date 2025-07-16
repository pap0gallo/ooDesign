<?php

namespace App\L10\src\testFunc;

require __DIR__ . '/../../../vendor/autoload.php';

use App\L10\src\Normalizer;

$raw = [
    [
        'name' => 'istambul',
        'country' => 'turkey'
    ],
    [
        'name' => 'Moscow ',
        'country' => ' Russia'
    ],
    [
        'name' => 'iStambul',
        'country' => 'tUrkey'
    ],
    [
        'name' => 'antalia',
        'country' => 'turkeY '
    ],
    [
        'name' => 'samarA',
        'country' => '  ruSsiA'
    ],
];


function normalize($raw)
{
    $normalizer = new Normalizer($raw);
    return $normalizer
        ->toLowerCaseAndTrim()
        ->toGroupByCountryAndUnique()
        ->toArray();
}

print_r(normalize($raw));