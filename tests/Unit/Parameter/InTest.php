<?php

namespace Tests\Unit\Parameter;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModel\PropertyRequiredException;
use Zerotoprod\DataModelSwagger\Parameter;

class InTest extends TestCase
{

    #[Test] public function missing_in(): void
    {
        $this->expectException(PropertyRequiredException::class, '');
        $this->expectExceptionMessage('Property `$in` is required.');

        Parameter::from([
            Parameter::name => 'name',
            Parameter::type => Parameter::type,
        ]);
    }

    #[Test] public function name_field(): void
    {
        $Parameter = Parameter::from([
            Parameter::in => 'query',
            Parameter::type => Parameter::type,
            Parameter::name => 'name'
        ]);

        self::assertEquals(
            expected: 'query',
            actual: $Parameter->in,
            message: 'The location of the parameter. Possible values are "query", "header", "path" or "cookie"'
        );
    }
}