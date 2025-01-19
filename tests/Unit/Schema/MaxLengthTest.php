<?php

namespace Tests\Unit\Schema;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelSwagger\Schema;

class MaxLengthTest extends TestCase
{
    #[Test] public function nullable(): void
    {
        $Schema = Schema::from();

        self::assertNull(
            actual: $Schema->maxLength,
        );
    }

    #[Test] public function int(): void
    {
        $Schema = Schema::from([
            Schema::maxLength => 1,
        ]);

        self::assertEquals(
            expected: 1,
            actual: $Schema->maxLength,
        );
    }

    #[Test] public function float(): void
    {
        $Schema = Schema::from([
            Schema::maxLength => 1.0,
        ]);

        self::assertEquals(
            expected: 1,
            actual: $Schema->maxLength,
        );
    }

    #[Test] public function zero(): void
    {
        $Schema = Schema::from([
            Schema::maxLength => 0,
        ]);

        self::assertEquals(
            expected: 0,
            actual: $Schema->maxLength,
        );
    }
}