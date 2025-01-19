<?php

namespace Tests\Unit\Parameter;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelSwagger\Parameter;

class PatternTest extends TestCase
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
            actual: $Parameter->pattern,
        );
    }

    #[Test] public function string(): void
    {
        $Parameter = Parameter::from([
            Parameter::name => Parameter::name,
            Parameter::in => Parameter::in,
            Parameter::type => Parameter::type,
            Parameter::pattern => '/(?<=a)b/',
        ]);

        self::assertEquals(
            expected: '/(?<=a)b/',
            actual: $Parameter->pattern,
        );
    }
}