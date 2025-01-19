<?php

namespace Tests\Unit\Item;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelSwagger\Item;

class ExclusiveMaximumTest extends TestCase
{
    #[Test] public function nullable(): void
    {
        $Item = Item::from();

        self::assertFalse(
            condition: $Item->exclusiveMaximum,
        );
    }

    #[Test] public function false(): void
    {
        $Item = Item::from([
            Item::exclusiveMaximum => false,
        ]);

        self::assertFalse(
            condition: $Item->exclusiveMaximum,
        );
    }

    #[Test] public function true(): void
    {
        $Item = Item::from([
            Item::exclusiveMaximum => true,
        ]);

        self::assertTrue(
            condition: $Item->exclusiveMaximum,
        );
    }
}