<?php

namespace Tests\Unit\Item;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelSwagger\Item;

class ItemsTest extends TestCase
{

    #[Test] public function default_value(): void
    {
        $Item = Item::from();

        self::assertNull(
            actual: $Item->items,
            message: 'Required if type is "array". Describes the type of items in the array.'
        );
    }

    #[Test] public function Item(): void
    {
        $Item = Item::from([
            Item::items => [
                Item::default => Item::default
            ]
        ]);

        self::assertInstanceOf(
            expected: Item::class,
            actual: $Item->items,
            message: 'Required if type is "array". Describes the type of items in the array.'
        );

        self::assertEquals(
            expected: Item::default,
            actual: $Item->items->default,
            message: 'Required if type is "array". Describes the type of items in the array.'
        );
    }

}