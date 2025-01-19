<?php

namespace Tests\Unit\Parameter;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelSwagger\Parameter;

class MinLengthTest extends TestCase
{
    #[Test] public function nullable(): void
    {
        $Parameter = Parameter::from([
            Parameter::name => Parameter::name,
            Parameter::in => Parameter::in,
            Parameter::type => Parameter::type,
        ]);

        self::assertEquals(
            expected: 0,
            actual: $Parameter->minLength,
        );
    }

    #[Test] public function int(): void
    {
        $Parameter = Parameter::from([
            Parameter::name => Parameter::name,
            Parameter::in => Parameter::in,
            Parameter::type => Parameter::type,
            Parameter::minLength => 1,
        ]);

        self::assertEquals(
            expected: 1,
            actual: $Parameter->minLength,
        );
    }

    #[Test] public function float(): void
    {
        $Parameter = Parameter::from([
            Parameter::name => Parameter::name,
            Parameter::in => Parameter::in,
            Parameter::type => Parameter::type,
            Parameter::minLength => 1.0,
        ]);

        self::assertEquals(
            expected: 1,
            actual: $Parameter->minLength,
        );
    }

    #[Test] public function zero(): void
    {
        $Parameter = Parameter::from([
            Parameter::name => Parameter::name,
            Parameter::in => Parameter::in,
            Parameter::type => Parameter::type,
            Parameter::minLength => 0,
        ]);

        self::assertEquals(
            expected: 0,
            actual: $Parameter->minLength,
        );
    }
}