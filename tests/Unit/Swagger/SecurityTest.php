<?php

namespace Tests\Unit\Swagger;

use Factories\InfoFactory;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelSwagger\Swagger;

class SecurityTest extends TestCase
{

    #[Test] public function default(): void
    {
        $Swagger = Swagger::from([
            Swagger::swagger => Swagger::swagger,
            Swagger::info => InfoFactory::factory()->make(),
            Swagger::paths => []
        ]);

        self::assertEquals(
            expected: [],
            actual: $Swagger->security,
            message: 'A declaration of which security schemes are applied for the API as a whole. The list of values describes alternative security schemes that can be used (that is, there is a logical OR between the security requirements). Individual operations can override this definition.'
        );
    }

    #[Test] public function security(): void
    {
        $Swagger = Swagger::from([
            Swagger::swagger => Swagger::swagger,
            Swagger::info => InfoFactory::factory()->make(),
            Swagger::paths => [],
            Swagger::security => [
                [],
                [
                    Swagger::security => [Swagger::security],
                ]
            ],
        ]);

        self::assertEmpty(
            actual: $Swagger->security[0],
            message: 'A declaration of which security schemes are applied for the API as a whole. The list of values describes alternative security schemes that can be used (that is, there is a logical OR between the security requirements). Individual operations can override this definition.'
        );
    }
}