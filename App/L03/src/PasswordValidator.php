<?php

namespace App\L03\src;

require __DIR__ . '/../../../vendor/autoload.php';

class PasswordValidator
{
    private $options;
    private $errors;

    public function __construct(array $options = [])
    {
        $this->errors = [];
        $this->options = ['minLength' => 8, 'containNumbers' => false];
        if (isset($options['minLength']) && is_int($options['minLength'])) {
            $this->options['minLength'] = $options['minLength'];
        }
        if (isset($options['containNumbers']) && is_bool($options['containNumbers'])) {
            $this->options['containNumbers'] = $options['containNumbers'];
        }
    }

    private function minLengthCheck(string $password): void
    {
        if (strlen($password) < $this->options['minLength']) {
            $this->errors['minLength'] = 'too small';
        }
    }

    private function containNumbersCheck(string $password): void
    {
        if (!strpbrk($password, '0123456789')) {
            $this->errors['containNumbers'] = 'should contain at least one number';
        }
    }

    public function validate(string $password): array
    {
        $this->errors = [];
        $this->minLengthCheck($password);
        if ($this->options['containNumbers']) {
            $this->containNumbersCheck($password);
        }

        return $this->errors;
    }

}