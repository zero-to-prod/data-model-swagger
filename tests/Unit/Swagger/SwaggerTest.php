<?php

namespace Tests\Unit\Swagger;

use Factories\InfoFactory;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelSwagger\Swagger;

class SwaggerTest extends TestCase
{
    #[Test] public function swagger(): void
    {
        $Swagger = Swagger::from([
            Swagger::swagger => Swagger::swagger,
            Swagger::info => InfoFactory::factory()->make(),
            Swagger::paths => [],
        ]);

        self::assertEquals(
            expected: Swagger::swagger,
            actual: $Swagger->swagger,
            message: 'Required. Specifies the Swagger Specification version being used. It can be used by the Swagger UI and other clients to interpret the API listing. The value MUST be "2.0".'
        );
    }
}