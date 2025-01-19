<?php

namespace Tests\Unit\Schema;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelSwagger\Schema;

class MinLengthTest extends TestCase
{
    #[Test] public function nullable(): void
    {
        $Schema = Schema::from();

        self::assertEquals(
            expected: 0,
            actual: $Schema->minLength,
        );
    }

    #[Test] public function int(): void
    {
        $Schema = Schema::from([
            Schema::minLength => 1,
        ]);

        self::assertEquals(
            expected: 1,
            actual: $Schema->minLength,
        );
    }

    #[Test] public function float(): void
    {
        $Schema = Schema::from([
            Schema::minLength => 1.0,
        ]);

        self::assertEquals(
            expected: 1,
            actual: $Schema->minLength,
        );
    }

    #[Test] public function zero(): void
    {
        $Schema = Schema::from([
            Schema::minLength => 0,
        ]);

        self::assertEquals(
            expected: 0,
            actual: $Schema->minLength,
        );
    }
}