<?php

namespace Tests\Unit\Header;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelSwagger\Header;

class CollectionFormatTest extends TestCase
{
    #[Test] public function nullable(): void
    {
        $Header = Header::from();

        self::assertEquals(
            expected: 'csv',
            actual: $Header->collectionFormat,
        );
    }

    #[Test] public function string(): void
    {
        $Header = Header::from([
            Header::collectionFormat => Header::collectionFormat,
        ]);

        self::assertEquals(
            expected: Header::collectionFormat,
            actual: $Header->collectionFormat,
        );
    }
}