<?php

namespace Tests\Unit\Schema;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelSwagger\Schema;

class ReadOnlyTest extends TestCase
{

    #[Test] public function default(): void
    {
        $Schema = Schema::from();

        self::assertFalse(
            condition: $Schema->readOnly,
            message: 'Default value is false.'
        );
    }

    #[Test] public function false(): void
    {
        $Schema = Schema::from([
            Schema::readOnly => false,
        ]);

        self::assertFalse(
            condition: $Schema->readOnly,
            message: 'Default value is false.'
        );
    }

    #[Test] public function true(): void
    {
        $Schema = Schema::from([
            Schema::readOnly => true,
        ]);

        self::assertTrue(
            condition: $Schema->readOnly,
            message: 'Default value is false.'
        );
    }
}