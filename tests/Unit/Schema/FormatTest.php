<?php

namespace Tests\Unit\Schema;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelSwagger\Schema;

class FormatTest extends TestCase
{

    #[Test] public function nullable(): void
    {
        $Schema = Schema::from();

        self::assertNull(
            actual: $Schema->format,
        );
    }

    #[Test] public function string(): void
    {
        $Schema = Schema::from([
            Schema::format => 'format',
        ]);

        self::assertEquals(
            expected: 'format',
            actual: $Schema->format,
        );
    }
}