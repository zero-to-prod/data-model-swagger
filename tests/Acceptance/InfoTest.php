<?php

namespace Tests\Acceptance;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelSwagger\Info;

class InfoTest extends TestCase
{
    #[Test] public function test(): void
    {
        $json = <<<JSON
        {
          "title": "Swagger Sample App",
          "description": "This is a sample server Petstore server.",
          "termsOfService": "http://swagger.io/terms/",
          "contact": {
            "name": "API Support",
            "url": "http://www.swagger.io/support",
            "email": "support@swagger.io"
          },
          "license": {
            "name": "Apache 2.0",
            "url": "http://www.apache.org/licenses/LICENSE-2.0.html"
          },
          "version": "1.0.1"
        }
        JSON;

        $Info = Info::from(json_decode($json, true));

        self::assertEquals(
            expected: 'Swagger Sample App',
            actual: $Info->title,
        );
        self::assertEquals(
            expected: 'This is a sample server Petstore server.',
            actual: $Info->description,
        );
        self::assertEquals(
            expected: 'http://swagger.io/terms/',
            actual: $Info->termsOfService,
        );
        self::assertEquals(
            expected: 'API Support',
            actual: $Info->contact->name,
        );
        self::assertEquals(
            expected: 'http://www.swagger.io/support',
            actual: $Info->contact->url,
        );
        self::assertEquals(
            expected: 'support@swagger.io',
            actual: $Info->contact->email,
        );
        self::assertEquals(
            expected: 'Apache 2.0',
            actual: $Info->license->name,
        );
        self::assertEquals(
            expected: 'http://www.apache.org/licenses/LICENSE-2.0.html',
            actual: $Info->license->url,
        );
        self::assertEquals(
            expected: '1.0.1',
            actual: $Info->version,
        );
    }
}