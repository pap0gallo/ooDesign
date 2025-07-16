<?php

namespace App\L11\src\testFunc;

require __DIR__ . '/../../../vendor/autoload.php';

use App\L11\src\Booking;

$booking = new Booking();

$booking->book('10-11-2008', '12-11-2008');

var_dump($booking->book('12-11-2008', '13-11-2008'));