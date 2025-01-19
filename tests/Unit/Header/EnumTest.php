<?php

namespace Tests\Unit\Header;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelSwagger\Header;

class EnumTest extends TestCase
{
    #[Test] public function nullable(): void
    {
        $Header = Header::from();

        self::assertEmpty(
            actual: $Header->enum,
        );
    }

    #[Test] public function string(): void
    {
        $Header = Header::from([
            Header::enum => ['1'],
        ]);

        self::assertEquals(
            expected: ['1'],
            actual: $Header->enum,
        );
    }
}