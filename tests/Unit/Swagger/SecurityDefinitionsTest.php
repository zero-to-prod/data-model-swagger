<?php

namespace Tests\Unit\Swagger;

use Factories\InfoFactory;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelSwagger\Response;
use Zerotoprod\DataModelSwagger\SecurityScheme;
use Zerotoprod\DataModelSwagger\Swagger;

class SecurityDefinitionsTest extends TestCase
{
    #[Test] public function null(): void
    {
        $Swagger = Swagger::from([
            Swagger::swagger => Swagger::swagger,
            Swagger::info => InfoFactory::factory()->make(),
            Swagger::paths => [],
        ]);

        self::assertEmpty(
            actual: $Swagger->securityDefinitions,
            message: 'An object to hold data types produced and consumed by operations.'
        );
    }

    #[Test] public function securityDefinitions(): void
    {
        $Swagger = Swagger::from([
            Swagger::swagger => Swagger::swagger,
            Swagger::info => InfoFactory::factory()->make(),
            Swagger::paths => [],
            Swagger::securityDefinitions => [
                'api_key' => [
                    SecurityScheme::description => SecurityScheme::description,
                ]
            ]
        ]);

        self::assertInstanceOf(SecurityScheme::class, $Swagger->securityDefinitions['api_key']);
        self::assertEquals(
            expected: SecurityScheme::description,
            actual: $Swagger->securityDefinitions['api_key']->description
        );
    }
}