<?php

namespace Tests\Unit\Operation;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelSwagger\Operation;
use Zerotoprod\DataModelSwagger\Reference;

class ConsumesTest extends TestCase
{
    #[Test] public function nullable(): void
    {
        $Operation = Operation::from([Operation::responses => ['example1' => [Reference::ref => 'ref']]]);

        self::assertEquals(
            expected: [],
            actual: $Operation->consumes,
            message: 'A list of MIME types the operation can consume. This overrides the consumes definition at the Swagger Object. An empty value MAY be used to clear the global definition. Value MUST be as described under Mime Types.'
        );
    }

    #[Test] public function string(): void
    {
        $Operation = Operation::from([
            Operation::consumes => ['application/x-www-form-urlencoded'],
            Operation::responses => ['example1' => [Reference::ref => 'ref']]
        ]);

        self::assertEquals(
            expected: ['application/x-www-form-urlencoded'],
            actual: $Operation->consumes,
            message: 'A list of MIME types the operation can consume. This overrides the consumes definition at the Swagger Object. An empty value MAY be used to clear the global definition. Value MUST be as described under Mime Types.'
        );
    }
}