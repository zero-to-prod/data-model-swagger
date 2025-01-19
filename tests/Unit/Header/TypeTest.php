<?php

namespace Tests\Unit\Header;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelSwagger\Header;

class TypeTest extends TestCase
{
    #[Test] public function nullable(): void
    {
        $Header = Header::from();

        self::assertNull(
            actual: $Header->type,
            message: 'Required. The type of the object. The value MUST be one of "string", "number", "integer", "boolean", or "array".'
        );
    }

    #[Test] public function string(): void
    {
        $Header = Header::from([
            Header::type => Header::type,
        ]);

        self::assertEquals(
            expected: Header::type,
            actual: $Header->type,
            message: 'Required. The type of the object. The value MUST be one of "string", "number", "integer", "boolean", or "array".'
        );
    }
}