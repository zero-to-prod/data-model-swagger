<?php

namespace Tests\Unit\Swagger;

use Factories\InfoFactory;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelSwagger\Swagger;

class ConsumesTest extends TestCase
{
    #[Test] public function null(): void
    {
        $Swagger = Swagger::from([
            Swagger::swagger => Swagger::swagger,
            Swagger::info => InfoFactory::factory()->make(),
            Swagger::paths => [],
        ]);

        self::assertEmpty(
            actual: $Swagger->consumes,
            message: 'A list of MIME types the APIs can consume. This is global to all APIs but can be overridden on specific API calls. Value MUST be as described under Mime Types.'
        );
    }

    #[Test] public function consumes(): void
    {
        $Swagger = Swagger::from([
            Swagger::swagger => Swagger::swagger,
            Swagger::info => InfoFactory::factory()->make(),
            Swagger::paths => [],
            Swagger::consumes => [Swagger::consumes],
        ]);

        self::assertEquals(
            expected: [Swagger::consumes],
            actual: $Swagger->consumes,
            message: 'A list of MIME types the APIs can consume. This is global to all APIs but can be overridden on specific API calls. Value MUST be as described under Mime Types.'
        );
    }
}