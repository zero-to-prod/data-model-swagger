<?php

namespace Tests\Unit\Item;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelSwagger\Item;

class ExclusiveMinimumTest extends TestCase
{

    #[Test] public function nullable(): void
    {
        $Item = Item::from();

        self::assertFalse(
            condition: $Item->exclusiveMinimum,
        );
    }

    #[Test] public function false(): void
    {
        $Item = Item::from([
            Item::exclusiveMinimum => false,
        ]);

        self::assertFalse(
            condition: $Item->exclusiveMinimum,
        );
    }

    #[Test] public function true(): void
    {
        $Item = Item::from([
            Item::exclusiveMinimum => true,
        ]);

        self::assertTrue(
            condition: $Item->exclusiveMinimum,
        );
    }
}