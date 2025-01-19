<?php

namespace Tests\Unit\PathItem;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelSwagger\Operation;
use Zerotoprod\DataModelSwagger\PathItem;
use Zerotoprod\DataModelSwagger\Response;

class GetTest extends TestCase
{

    #[Test] public function nullable(): void
    {
        $PathItem = PathItem::from();

        self::assertNull(
            actual: $PathItem->get,
            message: 'A definition of a GET operation on this path.'
        );
    }

    #[Test] public function get(): void
    {
        $PathItem = PathItem::from([
            PathItem::get => [
                Operation::responses => [
                    'example1' => [
                        Response::description => Response::description
                    ]
                ]
            ]
        ]);

        self::assertEquals(
            expected: Response::description,
            actual: $PathItem->get->responses['example1']->description,
            message: 'A definition of a GET operation on this path.'
        );
    }
}