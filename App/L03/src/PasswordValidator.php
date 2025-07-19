<?php

namespace App\L03\src;

require __DIR__ . '/../../../vendor/autoload.php';

class PasswordValidator
{
    private const array DEFAULT_OPTIONS = [
        'minLength' => 8,
        'containNumbers' => false,
    ];
    private $options;
    private $errors;

    public function __construct(array $options = [])
    {
        $filtered = [];
        $this->errors = [];
        if (isset($options['minLength']) && is_int($options['minLength'])) {
            $filtered['minLength'] = $options['minLength'];
        }
        if (isset($options['containNumbers']) && is_bool($options['containNumbers'])) {
            $filtered['containNumbers'] = $options['containNumbers'];
        }
        $this->options = array_merge(self::DEFAULT_OPTIONS,
            array_intersect_key($filtered, self::DEFAULT_OPTIONS));
    }

    private function minLengthCheck(string $password): void
    {
        if (mb_strlen($password) < $this->options['minLength']) {
            $this->errors['minLength'] = 'too small';
        }
    }

    private function containNumbersCheck(string $password): void
    {
        if (!$this->hasNumber($password)) {
            $this->errors['containNumbers'] = 'should contain at least one number';
        }
    }

    private function hasNumber(string $subject): bool
    {
        return strpbrk($subject, '0123456789') !== false;
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