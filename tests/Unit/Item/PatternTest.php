<?php

namespace Tests\Unit\Item;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelSwagger\Item;

class PatternTest extends TestCase
{
    #[Test] public function nullable(): void
    {
        $Item = Item::from();

        self::assertEquals(
            expected: 0,
            actual: $Item->pattern,
        );
    }

    #[Test] public function string(): void
    {
        $Item = Item::from([
            Item::pattern => '/(?<=a)b/',
        ]);

        self::assertEquals(
            expected: '/(?<=a)b/',
            actual: $Item->pattern,
        );
    }
}