<?php

namespace Tests\Unit\Header;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelSwagger\Header;

class MinLengthTest extends TestCase
{
    #[Test] public function nullable(): void
    {
        $Header = Header::from();

        self::assertEquals(
            expected: 0,
            actual: $Header->minLength,
        );
    }

    #[Test] public function int(): void
    {
        $Header = Header::from([
            Header::minLength => 1,
        ]);

        self::assertEquals(
            expected: 1,
            actual: $Header->minLength,
        );
    }

    #[Test] public function float(): void
    {
        $Header = Header::from([
            Header::minLength => 1.0,
        ]);

        self::assertEquals(
            expected: 1,
            actual: $Header->minLength,
        );
    }

    #[Test] public function zero(): void
    {
        $Header = Header::from([
            Header::minLength => 0,
        ]);

        self::assertEquals(
            expected: 0,
            actual: $Header->minLength,
        );
    }
}