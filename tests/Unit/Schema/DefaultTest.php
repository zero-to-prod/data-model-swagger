<?php

namespace Tests\Unit\Schema;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelSwagger\Schema;

class DefaultTest extends TestCase
{
    #[Test] public function nullable(): void
    {
        $Schema = Schema::from();

        self::assertNull(
            actual: $Schema->default,
        );
    }

    #[Test] public function string(): void
    {
        $Schema = Schema::from([
            Schema::default => 'default',
        ]);

        self::assertEquals(
            expected: 'default',
            actual: $Schema->default,
        );
    }
}