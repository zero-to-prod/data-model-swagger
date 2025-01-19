<?php

namespace Tests\Unit\PathItem;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelSwagger\Operation;
use Zerotoprod\DataModelSwagger\PathItem;
use Zerotoprod\DataModelSwagger\Reference;
use Zerotoprod\DataModelSwagger\Response;

class PatchTest extends TestCase
{

    #[Test] public function nullable(): void
    {
        $PathItem = PathItem::from();

        self::assertNull(
            actual: $PathItem->patch,
            message: 'A definition of a PATCH operation on this path.'
        );
    }

    #[Test] public function patch(): void
    {
        $PathItem = PathItem::from([
            PathItem::patch => [
                Operation::responses => [
                    'example1' => [
                        Response::description => Response::description
                    ]
                ]
            ]
        ]);

        self::assertEquals(
            expected: Response::description,
            actual: $PathItem->patch->responses['example1']->description,
            message: 'A definition of a PATCH operation on this path.'
        );
    }
}