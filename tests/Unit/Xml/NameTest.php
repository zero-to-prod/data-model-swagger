<?php

namespace Tests\Unit\Xml;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelSwagger\Xml;

class NameTest extends TestCase
{
    #[Test] public function nullable(): void
    {
        $Xml = Xml::from();

        self::assertNull(
            actual: $Xml->name,
            message: 'Replaces the name of the element/attribute used for the described schema property. When defined within items, it will affect the name of the individual XML elements within the list. When defined alongside type being "array" (outside the items), it will affect the wrapping element if and only if wrapped is true. If wrapped is false, it will be ignored.'
        );
    }

    #[Test] public function name_field(): void
    {
        $Xml = Xml::from([
            Xml::name => 'name'
        ]);

        self::assertEquals(
            expected: 'name',
            actual: $Xml->name,
            message: 'Replaces the name of the element/attribute used for the described schema property. When defined within items, it will affect the name of the individual XML elements within the list. When defined alongside type being "array" (outside the items), it will affect the wrapping element if and only if wrapped is true. If wrapped is false, it will be ignored.'
        );
    }
}