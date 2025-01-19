<?php

namespace Tests\Unit\PathItem;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelSwagger\PathItem;

class RefTest extends TestCase
{

    #[Test] public function nullable(): void
    {
        $PathItem = PathItem::from();

        self::assertNull(
            actual: $PathItem->ref,
            message: 'Allows for a referenced definition of this path item.'
        );
    }

    #[Test] public function ref(): void
    {
        $PathItem = PathItem::from([
            PathItem::ref => '#/components/schemas/Pet'
        ]);

        self::assertEquals(
            expected: '#/components/schemas/Pet',
            actual: $PathItem->ref,
            message: 'Allows for a referenced definition of this path item.'
        );
    }
}