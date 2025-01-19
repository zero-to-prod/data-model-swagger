<?php

namespace Tests\Unit\PathItem;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelSwagger\Operation;
use Zerotoprod\DataModelSwagger\PathItem;
use Zerotoprod\DataModelSwagger\Reference;
use Zerotoprod\DataModelSwagger\Response;

class OptionsTest extends TestCase
{

    #[Test] public function nullable(): void
    {
        $PathItem = PathItem::from();

        self::assertNull(
            actual: $PathItem->options,
            message: 'A definition of a OPTIONS operation on this path.'
        );
    }

    #[Test] public function options(): void
    {
        $PathItem = PathItem::from([
            PathItem::options => [
                Operation::responses => [
                    'example1' => [
                        Response::description => Response::description
                    ]
                ]
            ]
        ]);

        self::assertEquals(
            expected: Response::description,
            actual: $PathItem->options->responses['example1']->description,
            message: 'A definition of a OPTIONS operation on this path.'
        );
    }
}