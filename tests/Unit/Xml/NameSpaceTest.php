<?php

namespace Tests\Unit\Xml;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelSwagger\Xml;

class NameSpaceTest extends TestCase
{
    #[Test] public function nullable(): void
    {
        $Xml = Xml::from();

        self::assertNull(
            actual: $Xml->namespace,
            message: 'The URI of the namespace definition. Value _MUST_ be in the form of a non-relative URI.'
        );
    }

    #[Test] public function valid_url(): void
    {
        $Xml = Xml::from([
            Xml::namespace => 'https://example.com/schemas/',
        ]);

        self::assertEquals(
            expected: 'https://example.com/schemas/',
            actual: $Xml->namespace,
            message: 'The URI of the namespace definition. Value _MUST_ be in the form of a non-relative URI.'
        );
    }
}