<?php

namespace Tests\Unit\Parameter;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelSwagger\Parameter;

class RequiredTest extends TestCase
{

    #[Test] public function default(): void
    {
        $Parameter = Parameter::from([
            Parameter::in => 'query',
            Parameter::type => Parameter::type,
            Parameter::name => 'name'
        ]);

        self::assertFalse(
            condition: $Parameter->required,
            message: 'Determines whether this parameter is mandatory. If the parameter location is "path", this field is REQUIRED and its value _MUST_ be true. Otherwise, the field _MAY_ be included and its default value is false.'
        );
    }

    #[Test] public function false(): void
    {
        $Parameter = Parameter::from([
            Parameter::in => 'query',
            Parameter::type => Parameter::type,
            Parameter::name => 'name',
            Parameter::required => false
        ]);

        self::assertFalse(
            condition: $Parameter->required,
            message: 'Determines whether this parameter is mandatory. If the parameter location is "path", this field is REQUIRED and its value _MUST_ be true. Otherwise, the field _MAY_ be included and its default value is false.'
        );
    }

    #[Test] public function true(): void
    {
        $Parameter = Parameter::from([
            Parameter::in => 'query',
            Parameter::type => Parameter::type,
            Parameter::name => 'name',
            Parameter::required => true
        ]);

        self::assertTrue(
            condition: $Parameter->required,
            message: 'Determines whether this parameter is mandatory. If the parameter location is "path", this field is REQUIRED and its value _MUST_ be true. Otherwise, the field _MAY_ be included and its default value is false.'
        );
    }
}