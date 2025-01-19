<?php

namespace Tests\Unit\Schema;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelSwagger\Schema;

class MaxPropertiesTest extends TestCase
{

    #[Test] public function nullable(): void
    {
        $Schema = Schema::from();

        self::assertNull(
            actual: $Schema->maxProperties,
        );
    }

    #[Test] public function int(): void
    {
        $Schema = Schema::from([
            Schema::maxProperties => 1,
        ]);

        self::assertEquals(
            expected: 1,
            actual: $Schema->maxProperties,
        );
    }

    #[Test] public function float(): void
    {
        $Schema = Schema::from([
            Schema::maxProperties => 1.0,
        ]);

        self::assertEquals(
            expected: 1,
            actual: $Schema->maxProperties,
        );
    }

    #[Test] public function zero(): void
    {
        $Schema = Schema::from([
            Schema::maxProperties => 0,
        ]);

        self::assertEquals(
            expected: 0,
            actual: $Schema->maxProperties,
        );
    }
}