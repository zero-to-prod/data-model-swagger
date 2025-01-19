<?php

namespace Tests\Unit\SecurityScheme;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelSwagger\SecurityScheme;

class NameTest extends TestCase
{

    #[Test] public function default_value(): void
    {
        $SecurityScheme = SecurityScheme::from([
            SecurityScheme::type => 'apiKey',
            SecurityScheme::in => 'query',
            SecurityScheme::tokenUrl => 'openIdConnectUrl',
        ]);

        $this->assertNull(
            actual: $SecurityScheme->name,
            message: 'REQUIRED. The name of the header, query or cookie parameter to be used.'
        );
    }

    #[Test] public function name_property(): void
    {
        $SecurityScheme = SecurityScheme::from([
            SecurityScheme::type => 'apiKey',
            SecurityScheme::name => 'name',
            SecurityScheme::in => 'query',
            SecurityScheme::tokenUrl => 'openIdConnectUrl',
            SecurityScheme::flow => SecurityScheme::flow,
        ]);

        $this->assertEquals(
            expected: 'name',
            actual: $SecurityScheme->name,
            message: 'REQUIRED. The name of the header, query or cookie parameter to be used.'
        );
    }
}