<?php

namespace Tests\Unit\Schema;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelSwagger\Schema;

class ExclusiveMaximumTest extends TestCase
{

    #[Test] public function nullable(): void
    {
        $Schema = Schema::from();

        self::assertFalse(
            condition: $Schema->exclusiveMaximum,
        );
    }

    #[Test] public function false(): void
    {
        $Schema = Schema::from([
            Schema::exclusiveMaximum => false,
        ]);

        self::assertFalse(
            condition: $Schema->exclusiveMaximum,
        );
    }

    #[Test] public function true(): void
    {
        $Schema = Schema::from([
            Schema::exclusiveMaximum => true,
        ]);

        self::assertTrue(
            condition: $Schema->exclusiveMaximum,
        );
    }
}