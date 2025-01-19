<?php

namespace Tests\Unit\Parameter;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelSwagger\Parameter;

class TypeTest extends TestCase
{

    #[Test] public function name_field(): void
    {
        $Parameter = Parameter::from([
            Parameter::in => 'in',
            Parameter::name => Parameter::name,
            Parameter::type => Parameter::type
        ]);

        self::assertEquals(
            expected: Parameter::type,
            actual: $Parameter->type,
            message: 'The type of the parameter.'
        );
    }
}