<?php

namespace Tests\Unit\Header;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelSwagger\Header;

class MaximumTest extends TestCase
{
    #[Test] public function nullable(): void
    {
        $Header = Header::from();

        self::assertNull(
            actual: $Header->maximum,
        );
    }

    #[Test] public function int(): void
    {
        $Header = Header::from([
            Header::maximum => 1,
        ]);

        self::assertEquals(
            expected: 1,
            actual: $Header->maximum,
        );
    }

    #[Test] public function float(): void
    {
        $Header = Header::from([
            Header::maximum => 1.0,
        ]);

        self::assertEquals(
            expected: 1.0,
            actual: $Header->maximum,
        );
    }

    #[Test] public function zero(): void
    {
        $Header = Header::from([
            Header::maximum => 0,
        ]);

        self::assertEquals(
            expected: 0,
            actual: $Header->maximum,
        );
    }

    #[Test] public function non_zero(): void
    {
        $Header = Header::from([
            Header::maximum => -1,
        ]);

        self::assertEquals(
            expected: -1,
            actual: $Header->maximum,
        );
    }
}