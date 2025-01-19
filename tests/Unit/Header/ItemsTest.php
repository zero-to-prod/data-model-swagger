<?php

namespace Tests\Unit\Header;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelSwagger\Header;
use Zerotoprod\DataModelSwagger\Item;

class ItemsTest extends TestCase
{

    #[Test] public function default_value(): void
    {
        $Header = Header::from();

        self::assertNull(
            actual: $Header->items,
            message: 'Required if type is "array". Describes the type of items in the array.'
        );
    }

    #[Test] public function items(): void
    {
        $Header = Header::from([
            Header::type => Header::type,
            Header::items => [
                Item::default => Item::default
            ]
        ]);

        self::assertInstanceOf(
            expected: Item::class,
            actual: $Header->items,
            message: 'Required if type is "array". Describes the type of items in the array.'
        );

        self::assertEquals(
            expected: Header::default,
            actual: $Header->items->default,
            message: 'Required if type is "array". Describes the type of items in the array.'
        );
    }
}