<?php

namespace Tests\Unit\Header;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelSwagger\Header;

class FormatTest extends TestCase
{
    #[Test] public function nullable(): void
    {
        $Header = Header::from();

        self::assertNull(
            actual: $Header->format,
            message: 'The extending format for the previously mentioned type. See Data Type Formats for further details.'
        );
    }

    #[Test] public function string(): void
    {
        $Header = Header::from([
            Header::format => 'format',
        ]);

        self::assertEquals(
            expected: 'format',
            actual: $Header->format,
            message: 'The extending format for the previously mentioned type. See Data Type Formats for further details.'
        );
    }
}