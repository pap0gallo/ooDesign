<?php

namespace App\L01\src\Converter;

require __DIR__ . '/../../../vendor/autoload.php';


function toStd(array $array = []): \stdClass
{
    $obj = new \stdClass();
    foreach ($array as $key => $value) {
        $obj->$key = $value;
    }
    return $obj;
}