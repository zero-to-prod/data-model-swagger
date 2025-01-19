<?php

namespace Tests\Unit\Schema;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelSwagger\Schema;

class PatternTest extends TestCase
{
    #[Test] public function nullable(): void
    {
        $Schema = Schema::from();

        self::assertEquals(
            expected: 0,
            actual: $Schema->pattern,
        );
    }

    #[Test] public function string(): void
    {
        $Schema = Schema::from([
            Schema::pattern => '/(?<=a)b/',
        ]);

        self::assertEquals(
            expected: '/(?<=a)b/',
            actual: $Schema->pattern,
        );
    }
}