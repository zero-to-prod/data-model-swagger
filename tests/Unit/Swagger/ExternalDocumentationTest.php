<?php

namespace Tests\Unit\Swagger;

use Factories\InfoFactory;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelSwagger\ExternalDocumentation;
use Zerotoprod\DataModelSwagger\Swagger;

class ExternalDocumentationTest extends TestCase
{
    #[Test] public function nullable(): void
    {
        $Swagger = Swagger::from([
            Swagger::swagger => Swagger::swagger,
            Swagger::info => InfoFactory::factory()->make(),
            Swagger::paths => []
        ]);

        self::assertNull(
            actual: $Swagger->externalDocs,
            message: 'Additional external documentation.'
        );
    }

    #[Test] public function externalDocs(): void
    {
        $Swagger = Swagger::from([
            Swagger::swagger => Swagger::swagger,
            Swagger::info => InfoFactory::factory()->make(),
            Swagger::paths => [],
            Swagger::externalDocs => [
                ExternalDocumentation::url => ExternalDocumentation::url,
            ]
        ]);

        self::assertEquals(
            expected: ExternalDocumentation::url,
            actual: $Swagger->externalDocs->url,
            message: 'Additional external documentation.'
        );
    }
}