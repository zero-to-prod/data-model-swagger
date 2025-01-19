<?php

namespace Tests\Unit\Parameter;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelSwagger\Parameter;

class MinimumTest extends TestCase
{
    #[Test] public function nullable(): void
    {
        $Parameter = Parameter::from([
            Parameter::name => Parameter::name,
            Parameter::in => Parameter::in,
            Parameter::type => Parameter::type,
        ]);

        self::assertNull(
            actual: $Parameter->minimum,
        );
    }

    #[Test] public function int(): void
    {
        $Parameter = Parameter::from([
            Parameter::name => Parameter::name,
            Parameter::in => Parameter::in,
            Parameter::type => Parameter::type,
            Parameter::minimum => 1,
        ]);

        self::assertEquals(
            expected: 1,
            actual: $Parameter->minimum,
        );
    }

    #[Test] public function float(): void
    {
        $Parameter = Parameter::from([
            Parameter::name => Parameter::name,
            Parameter::in => Parameter::in,
            Parameter::type => Parameter::type,
            Parameter::minimum => 1.0,
        ]);

        self::assertEquals(
            expected: 1.0,
            actual: $Parameter->minimum,
        );
    }

    #[Test] public function zero(): void
    {
        $Parameter = Parameter::from([
            Parameter::name => Parameter::name,
            Parameter::in => Parameter::in,
            Parameter::type => Parameter::type,
            Parameter::minimum => 0,
        ]);

        self::assertEquals(
            expected: 0,
            actual: $Parameter->minimum,
        );
    }

    #[Test] public function non_zero(): void
    {
        $Parameter = Parameter::from([
            Parameter::name => Parameter::name,
            Parameter::in => Parameter::in,
            Parameter::type => Parameter::type,
            Parameter::minimum => -1,
        ]);

        self::assertEquals(
            expected: -1,
            actual: $Parameter->minimum,
        );
    }
}