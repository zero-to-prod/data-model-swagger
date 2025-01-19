<?php

namespace Tests\Unit\Schema;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelSwagger\Schema;

class DescriptionTest extends TestCase
{
    #[Test] public function nullable(): void
    {
        $Schema = Schema::from();

        self::assertNull(
            actual: $Schema->description,
        );
    }

    #[Test] public function string(): void
    {
        $Schema = Schema::from([
            Schema::description => 'description',
        ]);

        self::assertEquals(
            expected: 'description',
            actual: $Schema->description,
        );
    }
}