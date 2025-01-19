<?php

namespace Tests\Unit\Schema;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelSwagger\Schema;

class MaximumTest extends TestCase
{

    #[Test] public function nullable(): void
    {
        $Schema = Schema::from();

        self::assertNull(
            actual: $Schema->maximum,
        );
    }

    #[Test] public function int(): void
    {
        $Schema = Schema::from([
            Schema::maximum => 1,
        ]);

        self::assertEquals(
            expected: 1,
            actual: $Schema->maximum,
        );
    }

    #[Test] public function float(): void
    {
        $Schema = Schema::from([
            Schema::maximum => 1.0,
        ]);

        self::assertEquals(
            expected: 1.0,
            actual: $Schema->maximum,
        );
    }

    #[Test] public function zero(): void
    {
        $Schema = Schema::from([
            Schema::maximum => 0,
        ]);

        self::assertEquals(
            expected: 0,
            actual: $Schema->maximum,
        );
    }

    #[Test] public function non_zero(): void
    {
        $Schema = Schema::from([
            Schema::maximum => -1,
        ]);

        self::assertEquals(
            expected: -1,
            actual: $Schema->maximum,
        );
    }
}