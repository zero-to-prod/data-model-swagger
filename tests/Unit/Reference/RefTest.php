<?php

namespace Tests\Unit\Reference;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModel\PropertyRequiredException;
use Zerotoprod\DataModelSwagger\Reference;

class RefTest extends TestCase
{
    #[Test] public function missing_ref(): void
    {
        $this->expectException(PropertyRequiredException::class);
        Reference::from();
    }

    #[Test] public function ref(): void
    {
        $Reference = Reference::from([
            Reference::ref => '#/components/schemas/Pet'
        ]);

        self::assertEquals(
            expected: '#/components/schemas/Pet',
            actual: $Reference->ref,
            message: 'The reference string.'
        );
    }
}