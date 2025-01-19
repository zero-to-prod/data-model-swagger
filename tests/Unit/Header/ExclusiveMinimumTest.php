<?php

namespace Tests\Unit\Header;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelSwagger\Header;

class ExclusiveMinimumTest extends TestCase
{

    #[Test] public function nullable(): void
    {
        $Header = Header::from();

        self::assertFalse(
            condition: $Header->exclusiveMinimum,
        );
    }

    #[Test] public function false(): void
    {
        $Header = Header::from([
            Header::exclusiveMinimum => false,
        ]);

        self::assertFalse(
            condition: $Header->exclusiveMinimum,
        );
    }

    #[Test] public function true(): void
    {
        $Header = Header::from([
            Header::exclusiveMinimum => true,
        ]);

        self::assertTrue(
            condition: $Header->exclusiveMinimum,
        );
    }
}