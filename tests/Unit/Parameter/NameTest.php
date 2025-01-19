<?php

namespace Tests\Unit\Parameter;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModel\PropertyRequiredException;
use Zerotoprod\DataModelSwagger\Parameter;

class NameTest extends TestCase
{

    #[Test] public function missing_name(): void
    {
        $this->expectException(PropertyRequiredException::class, '');
        $this->expectExceptionMessage('Property `$name` is required.');

        Parameter::from([
            Parameter::type => Parameter::type,
            Parameter::in => 'in'
        ]);
    }

    #[Test] public function name_field(): void
    {
        $Parameter = Parameter::from([
            Parameter::in => 'in',
            Parameter::type => Parameter::type,
            Parameter::name => 'name'
        ]);

        self::assertEquals(
            expected: 'name',
            actual: $Parameter->name,
            message: 'The name of the parameter.'
        );
    }
}