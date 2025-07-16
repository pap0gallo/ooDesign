<?php

namespace App\L09\src\testFunc;

require __DIR__ . '/../../../vendor/autoload.php';

use App\L09\src\Url;

$url = new Url('http://yandex.ru:80?key=value&key2=value2');

var_dump($url->equals(new Url('http://yandex.ru:80?key=value&key2=value4')));