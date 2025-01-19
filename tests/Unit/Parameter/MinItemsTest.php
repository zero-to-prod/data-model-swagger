<?php

namespace Tests\Unit\Parameter;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelSwagger\Item;
use Zerotoprod\DataModelSwagger\Parameter;

class MinItemsTest extends TestCase
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
            actual: $Parameter->minItems,
        );
    }

    #[Test] public function int(): void
    {
        $Parameter = Parameter::from([
            Parameter::name => Parameter::name,
            Parameter::in => Parameter::in,
            Parameter::type => Parameter::type,
            Parameter::minItems => 1,
        ]);

        self::assertEquals(
            expected: 1,
            actual: $Parameter->minItems,
        );
    }

    #[Test] public function float(): void
    {
        $Parameter = Parameter::from([
            Parameter::name => Parameter::name,
            Parameter::in => Parameter::in,
            Parameter::type => Parameter::type,
            Parameter::minItems => 1.0,
        ]);

        self::assertEquals(
            expected: 1,
            actual: $Parameter->minItems,
        );
    }

    #[Test] public function zero(): void
    {
        $Parameter = Parameter::from([
            Parameter::name => Parameter::name,
            Parameter::in => Parameter::in,
            Parameter::type => Parameter::type,
            Parameter::minItems => 0,
        ]);

        self::assertEquals(
            expected: 0,
            actual: $Parameter->minItems,
        );
    }
}