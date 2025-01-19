<?php

namespace Tests\Unit\Header;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelSwagger\Header;

class PatternTest extends TestCase
{
    #[Test] public function nullable(): void
    {
        $Header = Header::from();

        self::assertEquals(
            expected: 0,
            actual: $Header->pattern,
        );
    }

    #[Test] public function string(): void
    {
        $Header = Header::from([
            Header::pattern => '/(?<=a)b/',
        ]);

        self::assertEquals(
            expected: '/(?<=a)b/',
            actual: $Header->pattern,
        );
    }
}