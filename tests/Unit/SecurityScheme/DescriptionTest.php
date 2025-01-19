<?php

namespace Tests\Unit\SecurityScheme;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelSwagger\SecurityScheme;

class DescriptionTest extends TestCase
{

    #[Test] public function default_value(): void
    {
        $SecurityScheme = SecurityScheme::from([
            SecurityScheme::type => 'apiKey',
            SecurityScheme::name => 'name',
            SecurityScheme::in => 'query',
            SecurityScheme::tokenUrl => 'openIdConnectUrl',
            SecurityScheme::flow => SecurityScheme::flow,
        ]);

        self::assertNull(
            actual: $SecurityScheme->description,
            message: 'A description for security scheme. [CommonMark] syntax MAY be used for rich text representation.'
        );
    }

    #[Test] public function string(): void
    {
        $SecurityScheme = SecurityScheme::from([
            SecurityScheme::description => 'description',
            SecurityScheme::type => 'apiKey',
            SecurityScheme::name => 'name',
            SecurityScheme::in => 'query',
            SecurityScheme::tokenUrl => 'openIdConnectUrl',
            SecurityScheme::flow => SecurityScheme::flow,
        ]);

        $this->assertEquals(
            expected: 'description',
            actual: $SecurityScheme->description,
            message: 'A description for security scheme. [CommonMark] syntax MAY be used for rich text representation.'
        );
    }
}