<?php

namespace Tests\Unit\Item;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelSwagger\Item;

class MinItemsTest extends TestCase
{
    #[Test] public function nullable(): void
    {
        $Item = Item::from();

        self::assertEquals(
            expected: 0,
            actual: $Item->minItems,
        );
    }

    #[Test] public function int(): void
    {
        $Item = Item::from([
            Item::minItems => 1,
        ]);

        self::assertEquals(
            expected: 1,
            actual: $Item->minItems,
        );
    }

    #[Test] public function float(): void
    {
        $Item = Item::from([
            Item::minItems => 1.0,
        ]);

        self::assertEquals(
            expected: 1,
            actual: $Item->minItems,
        );
    }

    #[Test] public function zero(): void
    {
        $Item = Item::from([
            Item::minItems => 0,
        ]);

        self::assertEquals(
            expected: 0,
            actual: $Item->minItems,
        );
    }
}