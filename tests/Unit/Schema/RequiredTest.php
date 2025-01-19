<?php

namespace Tests\Unit\Schema;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelSwagger\Schema;

class RequiredTest extends TestCase
{

    #[Test] public function nullable(): void
    {
        $Schema = Schema::from();

        self::assertEmpty(
            actual: $Schema->required,
        );
    }

    #[Test] public function string(): void
    {
        $Schema = Schema::from([
            Schema::required => ['1'],
        ]);

        self::assertEquals(
            expected: ['1'],
            actual: $Schema->required,
        );
    }
}