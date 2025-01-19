<?php

namespace Tests\Unit\Header;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelSwagger\Header;

class DefaultTest extends TestCase
{
    #[Test] public function nullable(): void
    {
        $Header = Header::from();

        self::assertNull(
            actual: $Header->default,
        );
    }

    #[Test] public function string(): void
    {
        $Header = Header::from([
            Header::default => 'default',
        ]);

        self::assertEquals(
            expected: 'default',
            actual: $Header->default,
        );
    }
}