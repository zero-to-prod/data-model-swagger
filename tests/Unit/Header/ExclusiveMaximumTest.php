<?php

namespace Tests\Unit\Header;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelSwagger\Header;

class ExclusiveMaximumTest extends TestCase
{
    #[Test] public function nullable(): void
    {
        $Header = Header::from();

        self::assertFalse(
            condition: $Header->exclusiveMaximum,
        );
    }

    #[Test] public function false(): void
    {
        $Header = Header::from([
            Header::exclusiveMaximum => false,
        ]);

        self::assertFalse(
            condition: $Header->exclusiveMaximum,
        );
    }

    #[Test] public function true(): void
    {
        $Header = Header::from([
            Header::exclusiveMaximum => true,
        ]);

        self::assertTrue(
            condition: $Header->exclusiveMaximum,
        );
    }
}