<?php

namespace Tests\Unit\Swagger;

use Factories\InfoFactory;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelSwagger\Response;
use Zerotoprod\DataModelSwagger\Swagger;

class ResponsesTest extends TestCase
{
    #[Test] public function null(): void
    {
        $Swagger = Swagger::from([
            Swagger::swagger => Swagger::swagger,
            Swagger::info => InfoFactory::factory()->make(),
            Swagger::paths => [],
        ]);

        self::assertEmpty(
            actual: $Swagger->responses,
            message: 'An object to hold data types produced and consumed by operations.'
        );
    }

    #[Test] public function responses(): void
    {
        $Swagger = Swagger::from([
            Swagger::swagger => Swagger::swagger,
            Swagger::info => InfoFactory::factory()->make(),
            Swagger::paths => [],
            Swagger::responses => [
                '200' => [
                    Response::description => Response::description,
                ]
            ]
        ]);

        self::assertInstanceOf(Response::class, $Swagger->responses['200']);
        self::assertEquals(
            expected: Response::description,
            actual: $Swagger->responses['200']->description
        );
    }
}