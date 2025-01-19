<?php

namespace Tests\Unit\Item;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelSwagger\Item;

class TypeTest extends TestCase
{
    #[Test] public function nullable(): void
    {
        $Item = Item::from();

        self::assertNull(
            actual: $Item->type,
        );
    }

    #[Test] public function string(): void
    {
        $Item = Item::from([
            Item::type => 'type',
        ]);

        self::assertEquals(
            expected: 'type',
            actual: $Item->type,
        );
    }
}