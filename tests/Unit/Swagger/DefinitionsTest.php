<?php

namespace Tests\Unit\Swagger;

use Factories\InfoFactory;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModel\PropertyRequiredException;
use Zerotoprod\DataModelSwagger\Operation;
use Zerotoprod\DataModelSwagger\PathItem;
use Zerotoprod\DataModelSwagger\Response;
use Zerotoprod\DataModelSwagger\Schema;
use Zerotoprod\DataModelSwagger\Swagger;

class DefinitionsTest extends TestCase
{
    #[Test] public function null(): void
    {
        $Swagger = Swagger::from([
            Swagger::swagger => Swagger::swagger,
            Swagger::info => InfoFactory::factory()->make(),
            Swagger::paths => [],
        ]);

        self::assertEmpty(
            actual: $Swagger->definitions,
            message: 'An object to hold data types produced and consumed by operations.'
        );
    }

    #[Test] public function definitions(): void
    {
        $Swagger = Swagger::from([
            Swagger::swagger => Swagger::swagger,
            Swagger::info => InfoFactory::factory()->make(),
            Swagger::paths => [],
            Swagger::definitions => [
                'Category' => [
                    Schema::type => Schema::type
                ]
            ]
        ]);

        self::assertInstanceOf(Schema::class, $Swagger->definitions['Category']);
        self::assertEquals(
            expected: Schema::type,
            actual: $Swagger->definitions['Category']->type
        );
    }
}