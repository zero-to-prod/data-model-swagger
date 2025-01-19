<?php

namespace Tests\Acceptance;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelSwagger\License;

class LicenseTest extends TestCase
{
    #[Test] public function test(): void
    {
        $json = <<<JSON
        {
          "name": "Apache 2.0",
          "url": "http://www.apache.org/licenses/LICENSE-2.0.html"
        }
        JSON;

        $License = License::from(json_decode($json, true));

        self::assertEquals(
            expected: 'Apache 2.0',
            actual: $License->name,
        );
        self::assertEquals(
            expected: 'http://www.apache.org/licenses/LICENSE-2.0.html',
            actual: $License->url,
        );
    }
}