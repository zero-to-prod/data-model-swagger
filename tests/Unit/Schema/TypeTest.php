<?php

namespace Tests\Unit\Schema;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelSwagger\Schema;

class TypeTest extends TestCase
{

    #[Test] public function nullable(): void
    {
        $Schema = Schema::from();

        self::assertNull(
            actual: $Schema->type,
        );
    }

    #[Test] public function string(): void
    {
        $Schema = Schema::from([
            Schema::type => 'type',
        ]);

        self::assertEquals(
            expected: 'type',
            actual: $Schema->type,
        );
    }
}