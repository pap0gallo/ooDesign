<?php

namespace App\L06\src;

require __DIR__ . '/../../../vendor/autoload.php';

use PHPUnit\Framework\TestCase;

class CourseTest extends TestCase
{
    public function testGetName()
    {
        $course = new Course('Math');
        $actual = $course->getName();
        $this->assertEquals('Math', $actual);
    }
}