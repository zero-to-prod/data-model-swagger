<?php

namespace Tests\Unit\Schema;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelSwagger\Schema;

class MinItemsTest extends TestCase
{
    #[Test] public function nullable(): void
    {
        $Schema = Schema::from();

        self::assertEquals(
            expected: 0,
            actual: $Schema->minItems,
        );
    }

    #[Test] public function int(): void
    {
        $Schema = Schema::from([
            Schema::minItems => 1,
        ]);

        self::assertEquals(
            expected: 1,
            actual: $Schema->minItems,
        );
    }

    #[Test] public function float(): void
    {
        $Schema = Schema::from([
            Schema::minItems => 1.0,
        ]);

        self::assertEquals(
            expected: 1,
            actual: $Schema->minItems,
        );
    }

    #[Test] public function zero(): void
    {
        $Schema = Schema::from([
            Schema::minItems => 0,
        ]);

        self::assertEquals(
            expected: 0,
            actual: $Schema->minItems,
        );
    }
}