<?php

namespace Tests\Unit\SecurityScheme;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelSwagger\SecurityScheme;

class FlowTest extends TestCase
{

    #[Test] public function default_value(): void
    {
        $SecurityScheme = SecurityScheme::from([
            SecurityScheme::name => 'name',
            SecurityScheme::type => 'apiKey',
            SecurityScheme::tokenUrl => 'openIdConnectUrl',
            SecurityScheme::in => 'query',
        ]);

        $this->assertNull(
            actual: $SecurityScheme->flow,
            message: 'REQUIRED. An object containing configuration information for the flow types supported.'
        );
    }

    #[Test] public function flows(): void
    {
        $SecurityScheme = SecurityScheme::from([
            SecurityScheme::type => 'apiKey',
            SecurityScheme::name => 'name',
            SecurityScheme::in => 'query',
            SecurityScheme::tokenUrl => 'openIdConnectUrl',
            SecurityScheme::flow => SecurityScheme::flow
        ]);

        $this->assertEquals(
            expected: SecurityScheme::flow,
            actual: $SecurityScheme->flow,
            message: 'REQUIRED. An object containing configuration information for the flow types supported.'
        );
    }
}