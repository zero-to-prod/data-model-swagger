<?php

namespace Tests\Unit\Parameter;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelSwagger\Parameter;

class AllowEmptyValueTest extends TestCase
{

    #[Test] public function default(): void
    {
        $Parameter = Parameter::from([
            Parameter::in => 'query',
            Parameter::name => 'name',
            Parameter::type => Parameter::type
        ]);

        self::assertFalse(
            condition: $Parameter->allowEmptyValue,
            message: 'Allows empty value',
        );
    }

    #[Test] public function false(): void
    {
        $Parameter = Parameter::from([
            Parameter::in => 'query',
            Parameter::name => 'name',
            Parameter::type => Parameter::type,
            Parameter::allowEmptyValue => false
        ]);

        self::assertFalse(
            condition: $Parameter->allowEmptyValue,
            message: 'Allows empty value'
        );
    }

    #[Test] public function true(): void
    {
        $Parameter = Parameter::from([
            Parameter::in => 'query',
            Parameter::name => 'name',
            Parameter::type => Parameter::type,
            Parameter::allowEmptyValue => true
        ]);

        self::assertTrue(
            condition: $Parameter->allowEmptyValue,
            message: 'Allows empty value'
        );
    }
}