<?php

namespace Tests\Unit\Schema;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelSwagger\Schema;

class MultipleOfTest extends TestCase
{
    #[Test] public function nullable(): void
    {
        $Schema = Schema::from();

        self::assertNull(
            actual: $Schema->multipleOf,
        );
    }

    #[Test] public function int(): void
    {
        $Schema = Schema::from([
            Schema::multipleOf => 1,
        ]);

        self::assertEquals(
            expected: 1,
            actual: $Schema->multipleOf,
        );
    }

    #[Test] public function float(): void
    {
        $Schema = Schema::from([
            Schema::multipleOf => 1.0,
        ]);

        self::assertEquals(
            expected: 1.0,
            actual: $Schema->multipleOf,
        );
    }
}