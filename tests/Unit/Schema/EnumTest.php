<?php

namespace Tests\Unit\Schema;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelSwagger\Schema;

class EnumTest extends TestCase
{
    #[Test] public function nullable(): void
    {
        $Schema = Schema::from();

        self::assertEmpty(
            actual: $Schema->enum,
        );
    }

    #[Test] public function string(): void
    {
        $Schema = Schema::from([
            Schema::enum => ['1'],
        ]);

        self::assertEquals(
            expected: ['1'],
            actual: $Schema->enum,
        );
    }
}