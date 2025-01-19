<?php

namespace Tests\Unit\PathItem;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelSwagger\Operation;
use Zerotoprod\DataModelSwagger\PathItem;
use Zerotoprod\DataModelSwagger\Reference;
use Zerotoprod\DataModelSwagger\Response;

class HeadTest extends TestCase
{

    #[Test] public function nullable(): void
    {
        $PathItem = PathItem::from();

        self::assertNull(
            actual: $PathItem->head,
            message: 'A definition of a HEAD operation on this path.'
        );
    }

    #[Test] public function head(): void
    {
        $PathItem = PathItem::from([
            PathItem::head => [
                Operation::responses => [
                    'example1' => [
                        Response::description => Response::description
                    ]
                ]
            ]
        ]);

        self::assertEquals(
            expected: Response::description,
            actual: $PathItem->head->responses['example1']->description,
            message: 'A definition of a HEAD operation on this path.'
        );
    }
}