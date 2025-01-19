<?php

namespace Tests\Unit\Swagger;

use Factories\InfoFactory;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelSwagger\Swagger;

class SchemesTest extends TestCase
{
    #[Test] public function null(): void
    {
        $Swagger = Swagger::from([
            Swagger::swagger => Swagger::swagger,
            Swagger::info => InfoFactory::factory()->make(),
            Swagger::paths => [],
        ]);

        self::assertEmpty(
            actual: $Swagger->schemes,
            message: 'The transfer protocol of the API. Values MUST be from the list: "http", "https", "ws", "wss". If the schemes is not included, the default scheme to be used is the one used to access the Swagger definition itself.'
        );
    }

    #[Test] public function schemes(): void
    {
        $Swagger = Swagger::from([
            Swagger::swagger => Swagger::swagger,
            Swagger::info => InfoFactory::factory()->make(),
            Swagger::paths => [],
            Swagger::schemes => [Swagger::schemes],
        ]);

        self::assertEquals(
            expected: [Swagger::schemes],
            actual: $Swagger->schemes,
            message: 'The transfer protocol of the API. Values MUST be from the list: "http", "https", "ws", "wss". If the schemes is not included, the default scheme to be used is the one used to access the Swagger definition itself.'
        );
    }
}