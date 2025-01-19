<?php

namespace Tests\Unit\Parameter;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelSwagger\Parameter;

class MaxItemsTest extends TestCase
{
    #[Test] public function nullable(): void
    {
        $Parameter = Parameter::from([
            Parameter::name => Parameter::name,
            Parameter::in => Parameter::in,
            Parameter::type => Parameter::type,
        ]);

        self::assertNull(
            actual: $Parameter->maxItems,
        );
    }

    #[Test] public function int(): void
    {
        $Parameter = Parameter::from([
            Parameter::name => Parameter::name,
            Parameter::in => Parameter::in,
            Parameter::type => Parameter::type,
            Parameter::maxItems => 1,
        ]);

        self::assertEquals(
            expected: 1,
            actual: $Parameter->maxItems,
        );
    }

    #[Test] public function float(): void
    {
        $Parameter = Parameter::from([
            Parameter::name => Parameter::name,
            Parameter::in => Parameter::in,
            Parameter::type => Parameter::type,
            Parameter::maxItems => 1.0,
        ]);

        self::assertEquals(
            expected: 1,
            actual: $Parameter->maxItems,
        );
    }

    #[Test] public function zero(): void
    {
        $Parameter = Parameter::from([
            Parameter::name => Parameter::name,
            Parameter::in => Parameter::in,
            Parameter::type => Parameter::type,
            Parameter::maxItems => 0,
        ]);

        self::assertEquals(
            expected: 0,
            actual: $Parameter->maxItems,
        );
    }
}