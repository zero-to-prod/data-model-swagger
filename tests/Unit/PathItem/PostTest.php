<?php

namespace Tests\Unit\PathItem;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelSwagger\Operation;
use Zerotoprod\DataModelSwagger\PathItem;
use Zerotoprod\DataModelSwagger\Reference;
use Zerotoprod\DataModelSwagger\Response;

class PostTest extends TestCase
{

    #[Test] public function nullable(): void
    {
        $PathItem = PathItem::from();

        self::assertNull(
            actual: $PathItem->post,
            message: 'A definition of a POST operation on this path.'
        );
    }

    #[Test] public function post(): void
    {
        $PathItem = PathItem::from([
            PathItem::post => [
                Operation::responses => [
                    'example1' => [
                        Response::description => Response::description
                    ]
                ]
            ]
        ]);

        self::assertEquals(
            expected: Response::description,
            actual: $PathItem->post->responses['example1']->description,
            message: 'A definition of a POST operation on this path.'
        );
    }
}