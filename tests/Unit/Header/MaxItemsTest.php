<?php

namespace Tests\Unit\Header;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelSwagger\Header;

class MaxItemsTest extends TestCase
{
    #[Test] public function nullable(): void
    {
        $Header = Header::from();

        self::assertNull(
            actual: $Header->maxItems,
        );
    }

    #[Test] public function int(): void
    {
        $Header = Header::from([
            Header::maxItems => 1,
        ]);

        self::assertEquals(
            expected: 1,
            actual: $Header->maxItems,
        );
    }

    #[Test] public function float(): void
    {
        $Header = Header::from([
            Header::maxItems => 1.0,
        ]);

        self::assertEquals(
            expected: 1,
            actual: $Header->maxItems,
        );
    }

    #[Test] public function zero(): void
    {
        $Header = Header::from([
            Header::maxItems => 0,
        ]);

        self::assertEquals(
            expected: 0,
            actual: $Header->maxItems,
        );
    }
}