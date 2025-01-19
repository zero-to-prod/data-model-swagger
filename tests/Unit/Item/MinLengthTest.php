<?php

namespace Tests\Unit\Item;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelSwagger\Item;

class MinLengthTest extends TestCase
{
    #[Test] public function nullable(): void
    {
        $Item = Item::from();

        self::assertEquals(
            expected: 0,
            actual: $Item->minLength,
        );
    }

    #[Test] public function int(): void
    {
        $Item = Item::from([
            Item::minLength => 1,
        ]);

        self::assertEquals(
            expected: 1,
            actual: $Item->minLength,
        );
    }

    #[Test] public function float(): void
    {
        $Item = Item::from([
            Item::minLength => 1.0,
        ]);

        self::assertEquals(
            expected: 1,
            actual: $Item->minLength,
        );
    }

    #[Test] public function zero(): void
    {
        $Item = Item::from([
            Item::minLength => 0,
        ]);

        self::assertEquals(
            expected: 0,
            actual: $Item->minLength,
        );
    }
}