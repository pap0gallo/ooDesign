<?php

namespace App\L06\src;

require __DIR__ . '/../../../vendor/autoload.php';

class Course
{
    private $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }
}
