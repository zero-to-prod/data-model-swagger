<?php

namespace Tests\Unit\Contact;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelSwagger\Contact;

class UrlTest extends TestCase
{
    #[Test] public function missing_url(): void
    {
        $Contact = Contact::from();

        self::assertNull(
            actual: $Contact->url,
            message: 'The URL for the contact information. This _MUST_ be in the form of a URL.'
        );
    }

    #[Test] public function url(): void
    {
        $Contact = Contact::from([
            Contact::url => 'https://example.com/'
        ]);

        self::assertEquals(
            expected: 'https://example.com/',
            actual: $Contact->url,
            message: 'The URL for the contact information. This _MUST_ be in the form of a URL.'
        );
    }
}