<?php

namespace Tests\Unit\Swagger;

use Factories\InfoFactory;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelSwagger\Info;
use Zerotoprod\DataModelSwagger\Swagger;

class InfoTest extends TestCase
{

    #[Test] public function info(): void
    {
        $Swagger = Swagger::from([
            Swagger::swagger => Swagger::swagger,
            Swagger::info => InfoFactory::factory()->make(),
            Swagger::paths => []
        ]);

        self::assertEquals(
            expected: Info::title,
            actual: $Swagger->info->title,
            message: 'REQUIRED. Provides metadata about the API. The metadata MAY be used by tooling as required.'
        );
    }
}