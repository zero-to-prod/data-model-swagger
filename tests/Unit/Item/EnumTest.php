<?php

namespace Tests\Unit\Item;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelSwagger\Item;

class EnumTest extends TestCase
{
    #[Test] public function nullable(): void
    {
        $Item = Item::from();

        self::assertEmpty(
            actual: $Item->enum,
        );
    }

    #[Test] public function string(): void
    {
        $Item = Item::from([
            Item::enum => ['1'],
        ]);

        self::assertEquals(
            expected: ['1'],
            actual: $Item->enum,
        );
    }
}