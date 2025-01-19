<?php

namespace Tests\Unit\Schema;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelSwagger\Schema;

class TitleTest extends TestCase
{
    #[Test] public function nullable(): void
    {
        $Schema = Schema::from();

        self::assertNull(
            actual: $Schema->title,
        );
    }

    #[Test] public function string(): void
    {
        $Schema = Schema::from([
            Schema::title => 'title',
        ]);

        self::assertEquals(
            expected: 'title',
            actual: $Schema->title,
        );
    }
}