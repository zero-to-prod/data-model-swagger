<?php

namespace Tests\Acceptance;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelSwagger\Contact;

class ContactTest extends TestCase
{
    #[Test] public function test(): void
    {
        $json = <<<JSON
        {
          "name": "API Support",
          "url": "http://www.swagger.io/support",
          "email": "support@swagger.io"
        }
        JSON;

        $Contact = Contact::from(json_decode($json, true));

        self::assertEquals(
            expected: 'API Support',
            actual: $Contact->name,
        );
        self::assertEquals(
            expected: 'http://www.swagger.io/support',
            actual: $Contact->url,
        );
        self::assertEquals(
            expected: 'support@swagger.io',
            actual: $Contact->email,
        );
    }
}