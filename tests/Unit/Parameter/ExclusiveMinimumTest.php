<?php

namespace Tests\Unit\Parameter;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelSwagger\Parameter;

class ExclusiveMinimumTest extends TestCase
{

    #[Test] public function nullable(): void
    {
        $Parameter = Parameter::from([
            Parameter::name => Parameter::name,
            Parameter::in => Parameter::in,
            Parameter::type => Parameter::type,
        ]);

        self::assertFalse(
            condition: $Parameter->exclusiveMinimum,
        );
    }

    #[Test] public function false(): void
    {
        $Parameter = Parameter::from([
            Parameter::name => Parameter::name,
            Parameter::in => Parameter::in,
            Parameter::type => Parameter::type,
            Parameter::exclusiveMinimum => false,
        ]);

        self::assertFalse(
            condition: $Parameter->exclusiveMinimum,
        );
    }

    #[Test] public function true(): void
    {
        $Parameter = Parameter::from([
            Parameter::name => Parameter::name,
            Parameter::in => Parameter::in,
            Parameter::type => Parameter::type,
            Parameter::exclusiveMinimum => true,
        ]);

        self::assertTrue(
            condition: $Parameter->exclusiveMinimum,
        );
    }
}