<?php

namespace App\L06\src;

require __DIR__ . '/../../../vendor/autoload.php';

use PHPUnit\Runner\AfterLastTestHook;
use App\Tests\CourseTest;

final class Checker implements AfterLastTestHook
{
    public function executeAfterLastTest(): void
    {
        new CourseTest();
    }
}