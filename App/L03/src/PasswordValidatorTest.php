<?php

namespace App\Tests;

use App\PasswordValidator;
use PHPUnit\Framework\TestCase;

class PasswordValidatorTest extends TestCase
{
    public function testValidateWithDefaultOptions()
    {
        $validator = new PasswordValidator();
        $errors1 = $validator->validate('qwertyui');
        $this->assertEmpty($errors1);

        $errors2 = $validator->validate('qwerty');
        $this->assertEquals([
            'minLength' => 'too small'
        ], $errors2);

        $errors3 = $validator->validate('another-password');
        $this->assertEmpty($errors3);
    }

    public function testValidateWithOptions()
    {
        $validator = new PasswordValidator([
            'containNumbers' => true
        ]);
        $errors1 = $validator->validate('qwertya3sdf');
        $this->assertEmpty($errors1);

        $errors2 = $validator->validate('qwerty');
        $this->assertEquals([
            'minLength' => 'too small',
            'containNumbers' => 'should contain at least one number'
        ], $errors2);

        $errors3 = $validator->validate('q23ty');
        $this->assertEquals([
            'minLength' => 'too small',
        ], $errors3);
    }

    public function testValidateWithIncorrectOptions()
    {
        $validator = new PasswordValidator([
            'containNumberz' => null
        ]);
        $errors1 = $validator->validate('qwertya3sdf');
        $this->assertEmpty($errors1);

        $errors2 = $validator->validate('qwerty');
        $this->assertEquals([
            'minLength' => 'too small',
        ], $errors2);
    }
}
