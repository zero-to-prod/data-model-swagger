<?php

namespace Tests\Unit\SecurityScheme;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelSwagger\SecurityScheme;

class TypeTest extends TestCase
{

    #[Test] public function type(): void
    {
        $SecurityScheme = SecurityScheme::from([
            SecurityScheme::type => 'apiKey',
            SecurityScheme::name => 'name',
            SecurityScheme::in => 'query',
            SecurityScheme::tokenUrl => 'openIdConnectUrl',
            SecurityScheme::flow => SecurityScheme::flow
        ]);

        $this->assertEquals(
            expected: 'apiKey',
            actual: $SecurityScheme->type,
            message: 'REQUIRED. The type of the security scheme. Valid values are "apiKey", "http", "oauth2", "openIdConnect".'
        );
    }
}