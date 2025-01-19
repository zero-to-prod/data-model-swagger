<?php

namespace Tests\Unit\Schema;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelSwagger\Schema;

class UniqueItemsTest extends TestCase
{

    #[Test] public function nullable(): void
    {
        $Schema = Schema::from();

        self::assertFalse(
            condition: $Schema->uniqueItems,
        );
    }

    #[Test] public function false(): void
    {
        $Schema = Schema::from([
            Schema::uniqueItems => false,
        ]);

        self::assertFalse(
            condition: $Schema->uniqueItems,
        );
    }

    #[Test] public function true(): void
    {
        $Schema = Schema::from([
            Schema::uniqueItems => true,
        ]);

        self::assertTrue(
            condition: $Schema->uniqueItems,
        );
    }
}