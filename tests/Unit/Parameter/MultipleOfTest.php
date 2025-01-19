<?php

namespace Tests\Unit\Parameter;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelSwagger\Parameter;

class MultipleOfTest extends TestCase
{
    #[Test] public function nullable(): void
    {
        $Parameter = Parameter::from([
            Parameter::name => Parameter::name,
            Parameter::in => Parameter::in,
            Parameter::type => Parameter::type,
        ]);

        self::assertNull(
            actual: $Parameter->multipleOf,
        );
    }

    #[Test] public function int(): void
    {
        $Parameter = Parameter::from([
            Parameter::name => Parameter::name,
            Parameter::in => Parameter::in,
            Parameter::type => Parameter::type,
            Parameter::multipleOf => 1,
        ]);

        self::assertEquals(
            expected: 1,
            actual: $Parameter->multipleOf,
        );
    }

    #[Test] public function float(): void
    {
        $Parameter = Parameter::from([
            Parameter::name => Parameter::name,
            Parameter::in => Parameter::in,
            Parameter::type => Parameter::type,
            Parameter::multipleOf => 1.0,
        ]);

        self::assertEquals(
            expected: 1.0,
            actual: $Parameter->multipleOf,
        );
    }
}