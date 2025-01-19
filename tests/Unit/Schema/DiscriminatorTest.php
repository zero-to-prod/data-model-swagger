<?php

namespace Tests\Unit\Schema;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelSwagger\Schema;

class DiscriminatorTest extends TestCase
{

    #[Test] public function discriminator_null(): void
    {
        $Schema = Schema::from();

        self::assertNull(
            actual: $Schema->discriminator,
            message: 'Adds support for polymorphism. The discriminator is used to determine which of a set of schemas a payload is expected to satisfy. See Composition and Inheritance for more details.'
        );
    }

    #[Test] public function discriminator(): void
    {
        $Schema = Schema::from([
            Schema::discriminator => Schema::discriminator,
        ]);

        self::assertEquals(
            expected: Schema::discriminator,
            actual: $Schema->discriminator,
            message: 'Adds support for polymorphism. The discriminator is used to determine which of a set of schemas a payload is expected to satisfy. See Composition and Inheritance for more details.'
        );
    }
}