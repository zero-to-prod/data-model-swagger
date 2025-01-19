<?php

namespace Tests\Unit\Operation;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelSwagger\Operation;
use Zerotoprod\DataModelSwagger\Reference;

class TagsTest extends TestCase
{
    #[Test] public function nullable(): void
    {
        $Operation = Operation::from([Operation::responses => ['example1' => [Reference::ref => 'ref']]]);

        self::assertEmpty(
            actual: $Operation->tags,
            message: 'A list of tags for API documentation control. Tags can be used for logical grouping of operations by resources or any other qualifier.'
        );
    }

    #[Test] public function string(): void
    {
        $Operation = Operation::from([
            Operation::tags => ['tag1' => 'tag1'],
            Operation::responses => ['example1' => [Reference::ref => 'ref']]
        ]);

        self::assertEquals(
            expected: 'tag1',
            actual: $Operation->tags['tag1'],
            message: 'A list of tags for API documentation control. Tags can be used for logical grouping of operations by resources or any other qualifier.'
        );
    }
}