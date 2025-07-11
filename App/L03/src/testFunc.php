<?php

namespace App\L03\src\testFunc;

require __DIR__ . '/../../../vendor/autoload.php';

use App\L03\src\PasswordValidator;


$validator = new PasswordValidator();



print_r($validator->validate('qwasdf'));