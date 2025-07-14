<?php

namespace App\L04\src\testFunc;

require __DIR__ . '/../../../vendor/autoload.php';

use App\L04\src\Truncater;


$truncater = new Truncater();

$actual = $truncater->truncate('one two', ['length' => 6]);

$actual = $truncater->truncate('one two');

$actual = $truncater->truncate('one two', ['length' => 3]);

$actual = $truncater->truncate('one two', ['separator' => '.']);
print_r($actual);