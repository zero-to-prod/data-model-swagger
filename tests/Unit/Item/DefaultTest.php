<?php

namespace Tests\Unit\Item;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelSwagger\Item;

class DefaultTest extends TestCase
{
    #[Test] public function nullable(): void
    {
        $Item = Item::from();

        self::assertNull(
            actual: $Item->default,
        );
    }

    #[Test] public function string(): void
    {
        $Item = Item::from([
            Item::default => 'default',
        ]);

        self::assertEquals(
            expected: 'default',
            actual: $Item->default,
        );
    }
}