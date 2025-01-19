<?php

namespace Tests\Unit\Parameter;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelSwagger\Parameter;

class DescriptionTest extends TestCase
{
    #[Test] public function missing_description(): void
    {
        $Parameter = Parameter::from([
            Parameter::in => 'query',
            Parameter::type => Parameter::type,
            Parameter::name => 'name'
        ]);

        self::assertNull(
            actual: $Parameter->description,
            message: 'A brief description of the parameter. This could contain examples of use. [CommonMark] syntax _MAY_ be used for rich text representation.'
        );
    }

    #[Test] public function description(): void
    {
        $Parameter = Parameter::from([
            Parameter::in => 'query',
            Parameter::name => 'name',
            Parameter::type => Parameter::type,
            Parameter::description => 'description',
        ]);

        self::assertEquals(
            expected: 'description',
            actual: $Parameter->description,
            message: 'A brief description of the parameter. This could contain examples of use. [CommonMark] syntax _MAY_ be used for rich text representation.'
        );
    }
}