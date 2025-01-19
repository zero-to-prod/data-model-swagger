<?php

namespace Tests\Unit\Item;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelSwagger\Item;

class UniqueItemsTest extends TestCase
{
    #[Test] public function nullable(): void
    {
        $Item = Item::from();

        self::assertFalse(
            condition: $Item->uniqueItems,
        );
    }

    #[Test] public function false(): void
    {
        $Item = Item::from([
            Item::uniqueItems => false,
        ]);

        self::assertFalse(
            condition: $Item->uniqueItems,
        );
    }

    #[Test] public function true(): void
    {
        $Item = Item::from([
            Item::uniqueItems => true,
        ]);

        self::assertTrue(
            condition: $Item->uniqueItems,
        );
    }
}