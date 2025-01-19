<?php

namespace Tests\Unit\SecurityScheme;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelSwagger\SecurityScheme;

class TokenUrlTest extends TestCase
{

    #[Test] public function default_value(): void
    {
        $SecurityScheme = SecurityScheme::from([
            SecurityScheme::type => 'apiKey',
            SecurityScheme::in => 'query',
            SecurityScheme::name => 'name',
        ]);

        $this->assertNull(
            actual: $SecurityScheme->tokenUrl,
            message: 'REQUIRED. Well-known URL to discover the [OpenID-Connect-Discovery] provider metadata.'
        );
    }

    #[Test] public function openIdConnectUrl(): void
    {
        $SecurityScheme = SecurityScheme::from([
            SecurityScheme::type => 'apiKey',
            SecurityScheme::name => 'name',
            SecurityScheme::in => 'query',
            SecurityScheme::tokenUrl => 'openIdConnectUrl',
            SecurityScheme::flow => SecurityScheme::flow,
        ]);

        $this->assertEquals(
            expected: 'openIdConnectUrl',
            actual: $SecurityScheme->tokenUrl,
            message: 'REQUIRED. Well-known URL to discover the [OpenID-Connect-Discovery] provider metadata.'
        );
    }
}