<?php

namespace Tests\Unit\Xml;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelSwagger\Xml;

class WrappedTest extends TestCase
{

    #[Test] public function default(): void
    {
        $Xml = Xml::from();

        self::assertFalse(
            condition: $Xml->wrapped,
            message: 'Declares whether the property definition translates to an attribute instead of an element. Default value is false.',
        );
    }

    #[Test] public function false(): void
    {
        $Xml = Xml::from([
            Xml::wrapped => false,
        ]);

        self::assertFalse(
            condition: $Xml->wrapped,
            message: 'Declares whether the property definition translates to an attribute instead of an element. Default value is false.'
        );
    }

    #[Test] public function true(): void
    {
        $Xml = Xml::from([
            Xml::wrapped => true,
        ]);

        self::assertTrue(
            condition: $Xml->wrapped,
            message: 'Declares whether the property definition translates to an attribute instead of an element. Default value is false.'
        );
    }
}