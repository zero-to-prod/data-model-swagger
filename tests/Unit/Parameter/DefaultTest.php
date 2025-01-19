<?php

namespace Tests\Unit\Parameter;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelSwagger\Parameter;

class DefaultTest extends TestCase
{
    #[Test] public function nullable(): void
    {
        $Parameter = Parameter::from([
            Parameter::name => Parameter::name,
            Parameter::in => Parameter::in,
            Parameter::type => Parameter::type,
        ]);

        self::assertNull(
            actual: $Parameter->default,
        );
    }

    #[Test] public function string(): void
    {
        $Parameter = Parameter::from([
            Parameter::name => Parameter::name,
            Parameter::in => Parameter::in,
            Parameter::type => Parameter::type,
            Parameter::default => Parameter::default,
        ]);

        self::assertEquals(
            expected: Parameter::default,
            actual: $Parameter->default,
        );
    }
}