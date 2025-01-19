<?php

namespace Tests\Unit\Item;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelSwagger\Item;

class MaximumTest extends TestCase
{
    #[Test] public function nullable(): void
    {
        $Item = Item::from();

        self::assertNull(
            actual: $Item->maximum,
        );
    }

    #[Test] public function int(): void
    {
        $Item = Item::from([
            Item::maximum => 1,
        ]);

        self::assertEquals(
            expected: 1,
            actual: $Item->maximum,
        );
    }

    #[Test] public function float(): void
    {
        $Item = Item::from([
            Item::maximum => 1.0,
        ]);

        self::assertEquals(
            expected: 1.0,
            actual: $Item->maximum,
        );
    }

    #[Test] public function zero(): void
    {
        $Item = Item::from([
            Item::maximum => 0,
        ]);

        self::assertEquals(
            expected: 0,
            actual: $Item->maximum,
        );
    }

    #[Test] public function non_zero(): void
    {
        $Item = Item::from([
            Item::maximum => -1,
        ]);

        self::assertEquals(
            expected: -1,
            actual: $Item->maximum,
        );
    }
}