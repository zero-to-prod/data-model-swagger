<?php

namespace Tests\Unit\Item;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelSwagger\Item;

class MultipleOfTest extends TestCase
{
    #[Test] public function nullable(): void
    {
        $Item = Item::from();

        self::assertNull(
            actual: $Item->multipleOf,
        );
    }

    #[Test] public function int(): void
    {
        $Item = Item::from([
            Item::multipleOf => 1,
        ]);

        self::assertEquals(
            expected: 1,
            actual: $Item->multipleOf,
        );
    }

    #[Test] public function float(): void
    {
        $Item = Item::from([
            Item::multipleOf => 1.0,
        ]);

        self::assertEquals(
            expected: 1.0,
            actual: $Item->multipleOf,
        );
    }
}