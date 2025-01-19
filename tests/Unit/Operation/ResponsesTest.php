<?php

namespace Tests\Unit\Operation;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModel\PropertyRequiredException;
use Zerotoprod\DataModelSwagger\MediaType;
use Zerotoprod\DataModelSwagger\Operation;
use Zerotoprod\DataModelSwagger\Reference;
use Zerotoprod\DataModelSwagger\Response;

class ResponsesTest extends TestCase
{

    #[Test] public function required(): void
    {
        $this->expectException(PropertyRequiredException::class);

        Operation::from();
    }

    #[Test] public function ref(): void
    {
        $Operation = Operation::from([
            Operation::responses => [
                'example1' => [
                    Response::description => Response::description
                ]
            ],
        ]);

        self::assertEquals(
            expected: Response::description,
            actual: $Operation->responses['example1']->description,
            message: 'REQUIRED. The list of possible responses as they are returned from executing this operation.'
        );
    }

    #[Test] public function response(): void
    {
        $Operation = Operation::from([
            Operation::responses => [
                '200' => [
                    Response::description => 'description',
                ]
            ],
        ]);

        self::assertInstanceOf(
            expected: Response::class,
            actual: $Operation->responses['200'],
            message: 'REQUIRED. The list of possible responses as they are returned from executing this operation.'
        );

        self::assertEquals(
            expected: 'description',
            actual: $Operation->responses['200']->description,
            message: 'REQUIRED. The list of possible responses as they are returned from executing this operation.'
        );
    }
}