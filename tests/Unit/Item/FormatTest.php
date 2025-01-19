<?php

namespace Tests\Unit\Item;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelSwagger\Item;

class FormatTest extends TestCase
{
    #[Test] public function nullable(): void
    {
        $Item = Item::from();

        self::assertNull(
            actual: $Item->format,
        );
    }

    #[Test] public function string(): void
    {
        $Item = Item::from([
            Item::format => 'format',
        ]);

        self::assertEquals(
            expected: 'format',
            actual: $Item->format,
        );
    }
}