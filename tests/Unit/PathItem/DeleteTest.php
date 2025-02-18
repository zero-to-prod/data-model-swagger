<?php

namespace Tests\Unit\PathItem;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelSwagger\Operation;
use Zerotoprod\DataModelSwagger\PathItem;
use Zerotoprod\DataModelSwagger\Response;

class DeleteTest extends TestCase
{
    #[Test] public function nullable(): void
    {
        $PathItem = PathItem::from();

        self::assertNull(
            actual: $PathItem->delete,
            message: 'A definition of a DELETE operation on this path.'
        );
    }

    #[Test] public function delete(): void
    {
        $PathItem = PathItem::from([
            PathItem::delete => [
                Operation::responses => [
                    'example1' => [
                        Response::description => Response::description
                    ]
                ]
            ]
        ]);

        self::assertEquals(
            expected: Response::description,
            actual: $PathItem->delete->responses['example1']->description,
            message: 'A definition of a DELETE operation on this path.'
        );
    }
}