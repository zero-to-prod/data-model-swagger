<?php

namespace Tests\Unit\Swagger;

use Factories\InfoFactory;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelSwagger\Parameter;
use Zerotoprod\DataModelSwagger\Swagger;

class ParametersTest extends TestCase
{
    #[Test] public function null(): void
    {
        $Swagger = Swagger::from([
            Swagger::swagger => Swagger::swagger,
            Swagger::info => InfoFactory::factory()->make(),
            Swagger::paths => [],
        ]);

        self::assertEmpty(
            actual: $Swagger->parameters,
            message: 'An object to hold data types produced and consumed by operations.'
        );
    }

    #[Test] public function parameters(): void
    {
        $Swagger = Swagger::from([
            Swagger::swagger => Swagger::swagger,
            Swagger::info => InfoFactory::factory()->make(),
            Swagger::paths => [],
            Swagger::parameters => [
                Swagger::parameters => [
                    Parameter::name => Parameter::name,
                    Parameter::in => Parameter::in,
                    Parameter::type => Parameter::type
                ]
            ]
        ]);

        self::assertInstanceOf(Parameter::class, $Swagger->parameters[Swagger::parameters]);
        self::assertEquals(
            expected: Parameter::type,
            actual: $Swagger->parameters[Swagger::parameters]->type
        );
    }
}