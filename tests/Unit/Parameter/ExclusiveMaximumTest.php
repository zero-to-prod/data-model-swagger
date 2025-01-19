<?php

namespace Tests\Unit\Parameter;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelSwagger\Parameter;

class ExclusiveMaximumTest extends TestCase
{
    #[Test] public function nullable(): void
    {
        $Parameter = Parameter::from([
            Parameter::name => Parameter::name,
            Parameter::in => Parameter::in,
            Parameter::type => Parameter::type,
        ]);

        self::assertFalse(
            condition: $Parameter->exclusiveMaximum,
        );
    }

    #[Test] public function false(): void
    {
        $Parameter = Parameter::from([
            Parameter::name => Parameter::name,
            Parameter::in => Parameter::in,
            Parameter::type => Parameter::type,
            Parameter::exclusiveMaximum => false,
        ]);

        self::assertFalse(
            condition: $Parameter->exclusiveMaximum,
        );
    }

    #[Test] public function true(): void
    {
        $Parameter = Parameter::from([
            Parameter::name => Parameter::name,
            Parameter::in => Parameter::in,
            Parameter::type => Parameter::type,
            Parameter::exclusiveMaximum => true,
        ]);

        self::assertTrue(
            condition: $Parameter->exclusiveMaximum,
        );
    }
}