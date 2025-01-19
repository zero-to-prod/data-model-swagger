<?php

namespace Tests\Unit\Swagger;

use Factories\InfoFactory;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModel\PropertyRequiredException;
use Zerotoprod\DataModelSwagger\Operation;
use Zerotoprod\DataModelSwagger\PathItem;
use Zerotoprod\DataModelSwagger\Response;
use Zerotoprod\DataModelSwagger\Swagger;

class PathsTest extends TestCase
{
    #[Test] public function missing(): void
    {
        $this->expectException(PropertyRequiredException::class);
        $this->expectExceptionMessage('Property `$paths` is required.');
        Swagger::from([
            Swagger::swagger => Swagger::swagger,
            Swagger::info => InfoFactory::factory()->make(),
        ]);
    }

    #[Test] public function paths(): void
    {
        $Swagger = Swagger::from([
            Swagger::swagger => Swagger::swagger,
            Swagger::info => InfoFactory::factory()->make(),
            Swagger::paths => [
                '/pets' => [
                    PathItem::get => [
                        Operation::responses => [
                            '200' => [
                                Response::description => Response::description
                            ]
                        ]
                    ]
                ]
            ]
        ]);

        self::assertInstanceOf(PathItem::class, $Swagger->paths['/pets']);
        self::assertEquals(
            expected: Response::description,
            actual: $Swagger->paths['/pets']->get->responses['200']->description
        );
    }
}