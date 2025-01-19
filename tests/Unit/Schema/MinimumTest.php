<?php

namespace Tests\Unit\Schema;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelSwagger\Schema;

class MinimumTest extends TestCase
{

    #[Test] public function nullable(): void
    {
        $Schema = Schema::from();

        self::assertNull(
            actual: $Schema->minimum,
        );
    }

    #[Test] public function int(): void
    {
        $Schema = Schema::from([
            Schema::minimum => 1,
        ]);

        self::assertEquals(
            expected: 1,
            actual: $Schema->minimum,
        );
    }

    #[Test] public function float(): void
    {
        $Schema = Schema::from([
            Schema::minimum => 1.0,
        ]);

        self::assertEquals(
            expected: 1.0,
            actual: $Schema->minimum,
        );
    }

    #[Test] public function zero(): void
    {
        $Schema = Schema::from([
            Schema::minimum => 0,
        ]);

        self::assertEquals(
            expected: 0,
            actual: $Schema->minimum,
        );
    }

    #[Test] public function non_zero(): void
    {
        $Schema = Schema::from([
            Schema::minimum => -1,
        ]);

        self::assertEquals(
            expected: -1,
            actual: $Schema->minimum,
        );
    }
}