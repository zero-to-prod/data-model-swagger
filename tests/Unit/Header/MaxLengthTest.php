<?php

namespace Tests\Unit\Header;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelSwagger\Header;

class MaxLengthTest extends TestCase
{
    #[Test] public function nullable(): void
    {
        $Header = Header::from();

        self::assertNull(
            actual: $Header->maxLength,
        );
    }

    #[Test] public function int(): void
    {
        $Header = Header::from([
            Header::maxLength => 1,
        ]);

        self::assertEquals(
            expected: 1,
            actual: $Header->maxLength,
        );
    }

    #[Test] public function float(): void
    {
        $Header = Header::from([
            Header::maxLength => 1.0,
        ]);

        self::assertEquals(
            expected: 1,
            actual: $Header->maxLength,
        );
    }

    #[Test] public function zero(): void
    {
        $Header = Header::from([
            Header::maxLength => 0,
        ]);

        self::assertEquals(
            expected: 0,
            actual: $Header->maxLength,
        );
    }
}