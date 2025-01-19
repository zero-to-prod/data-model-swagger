<?php

namespace Tests\Unit\Schema;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelSwagger\Schema;

class ExclusiveMinimumTest extends TestCase
{

    #[Test] public function nullable(): void
    {
        $Schema = Schema::from();

        self::assertFalse(
            condition: $Schema->exclusiveMinimum,
        );
    }

    #[Test] public function false(): void
    {
        $Schema = Schema::from([
            Schema::exclusiveMinimum => false,
        ]);

        self::assertFalse(
            condition: $Schema->exclusiveMinimum,
        );
    }

    #[Test] public function true(): void
    {
        $Schema = Schema::from([
            Schema::exclusiveMinimum => true,
        ]);

        self::assertTrue(
            condition: $Schema->exclusiveMinimum,
        );
    }
}