<?php

namespace Tests\Unit\Parameter;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelSwagger\Item;
use Zerotoprod\DataModelSwagger\Parameter;

class ItemsTest extends TestCase
{

    #[Test] public function default_value(): void
    {
        $Parameter = Parameter::from([
            Parameter::in => 'query',
            Parameter::type => Parameter::type,
            Parameter::name => 'name',
        ]);

        self::assertNull(
            actual: $Parameter->items,
            message: 'Required if type is "array". Describes the type of items in the array.'
        );
    }

    #[Test] public function items(): void
    {
        $Parameter = Parameter::from([
            Parameter::in => 'query',
            Parameter::name => 'name',
            Parameter::type => Parameter::type,
            Parameter::items => [
                Item::default => Item::default
            ]
        ]);

        self::assertInstanceOf(
            expected: Item::class,
            actual: $Parameter->items,
            message: 'Required if type is "array". Describes the type of items in the array.'
        );

        self::assertEquals(
            expected: Item::default,
            actual: $Parameter->items->default,
            message: 'Required if type is "array". Describes the type of items in the array.'
        );
    }
}