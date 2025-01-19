<?php

namespace Tests\Unit\SecurityScheme;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelSwagger\SecurityScheme;

class InTest extends TestCase
{

    #[Test] public function default_value(): void
    {
        $SecurityScheme = SecurityScheme::from([
            SecurityScheme::name => 'name',
            SecurityScheme::type => 'apiKey',
            SecurityScheme::tokenUrl => 'openIdConnectUrl',
        ]);

        $this->assertNull(
            actual: $SecurityScheme->in,
            message: 'REQUIRED. The location of the API key. Valid values are "query", "header", or "cookie".'
        );
    }

    #[Test] public function in(): void
    {
        $SecurityScheme = SecurityScheme::from([
            SecurityScheme::type => 'apiKey',
            SecurityScheme::name => 'name',
            SecurityScheme::in => 'query',
            SecurityScheme::tokenUrl => 'openIdConnectUrl',
            SecurityScheme::flow => SecurityScheme::flow,
        ]);

        $this->assertEquals(
            expected: 'query',
            actual: $SecurityScheme->in,
            message: 'REQUIRED. The location of the API key. Valid values are "query", "header", or "cookie".'
        );
    }
}