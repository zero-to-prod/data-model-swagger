<?php

namespace Tests\Unit\Item;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelSwagger\Item;

class MaxLengthTest extends TestCase
{
    #[Test] public function nullable(): void
    {
        $Item = Item::from();

        self::assertNull(
            actual: $Item->maxLength,
        );
    }

    #[Test] public function int(): void
    {
        $Item = Item::from([
            Item::maxLength => 1,
        ]);

        self::assertEquals(
            expected: 1,
            actual: $Item->maxLength,
        );
    }

    #[Test] public function float(): void
    {
        $Item = Item::from([
            Item::maxLength => 1.0,
        ]);

        self::assertEquals(
            expected: 1,
            actual: $Item->maxLength,
        );
    }

    #[Test] public function zero(): void
    {
        $Item = Item::from([
            Item::maxLength => 0,
        ]);

        self::assertEquals(
            expected: 0,
            actual: $Item->maxLength,
        );
    }
}