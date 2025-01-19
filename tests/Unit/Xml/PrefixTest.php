<?php

namespace Tests\Unit\Xml;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelSwagger\Xml;

class PrefixTest extends TestCase
{
    #[Test] public function nullable(): void
    {
        $Xml = Xml::from();

        self::assertNull(
            actual: $Xml->prefix,
            message: 'The prefix to be used for the name.'
        );
    }

    #[Test] public function name_field(): void
    {
        $Xml = Xml::from([
            Xml::prefix => 'prefix'
        ]);

        self::assertEquals(
            expected: 'prefix',
            actual: $Xml->prefix,
            message: 'The prefix to be used for the name.'
        );
    }
}