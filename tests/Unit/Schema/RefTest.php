<?php

namespace Tests\Unit\Schema;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelSwagger\Schema;

class RefTest extends TestCase
{

    #[Test] public function nullable(): void
    {
        $Schema = Schema::from();

        self::assertNull(
            actual: $Schema->ref,
            message: 'Allows for a referenced definition of this path item.'
        );
    }

    #[Test] public function ref(): void
    {
        $Schema = Schema::from([
            Schema::ref => Schema::ref
        ]);

        self::assertEquals(
            expected: Schema::ref,
            actual: $Schema->ref,
            message: 'Allows for a referenced definition of this path item.'
        );
    }
}