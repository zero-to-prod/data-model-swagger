<?php

namespace Tests\Acceptance;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelSwagger\ExternalDocumentation;

class ExternalDocumentationTest extends TestCase
{
    #[Test] public function test(): void
    {
        $json = <<<JSON
        {
          "description": "Find more info here",
          "url": "https://swagger.io"
        }
        JSON;

        $ExternalDocumentation = ExternalDocumentation::from(json_decode($json, true));

        self::assertEquals(
            expected: 'Find more info here',
            actual: $ExternalDocumentation->description,
        );
        self::assertEquals(
            expected: 'https://swagger.io',
            actual: $ExternalDocumentation->url,
        );
    }
}