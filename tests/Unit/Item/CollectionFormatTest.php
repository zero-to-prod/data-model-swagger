<?php

namespace Tests\Unit\Item;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelSwagger\Item;

class CollectionFormatTest extends TestCase
{
    #[Test] public function nullable(): void
    {
        $Item = Item::from();

        self::assertEquals(
            expected: 'csv',
            actual: $Item->collectionFormat,
        );
    }

    #[Test] public function string(): void
    {
        $Item = Item::from([
            Item::collectionFormat => Item::collectionFormat,
        ]);

        self::assertEquals(
            expected: Item::collectionFormat,
            actual: $Item->collectionFormat,
        );
    }
}