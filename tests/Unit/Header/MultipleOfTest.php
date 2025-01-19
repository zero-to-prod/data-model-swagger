<?php

namespace Tests\Unit\Header;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelSwagger\Header;

class MultipleOfTest extends TestCase
{
    #[Test] public function nullable(): void
    {
        $Header = Header::from();

        self::assertNull(
            actual: $Header->multipleOf,
        );
    }

    #[Test] public function int(): void
    {
        $Header = Header::from([
            Header::multipleOf => 1,
        ]);

        self::assertEquals(
            expected: 1,
            actual: $Header->multipleOf,
        );
    }

    #[Test] public function float(): void
    {
        $Header = Header::from([
            Header::multipleOf => 1.0,
        ]);

        self::assertEquals(
            expected: 1.0,
            actual: $Header->multipleOf,
        );
    }
}