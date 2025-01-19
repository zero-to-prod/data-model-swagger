<?php

namespace Tests\Unit\Operation;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelSwagger\Operation;
use Zerotoprod\DataModelSwagger\Reference;

class ProducesTest extends TestCase
{
    #[Test] public function nullable(): void
    {
        $Operation = Operation::from([Operation::responses => ['example1' => [Reference::ref => 'ref']]]);

        self::assertEquals(
            expected: [],
            actual: $Operation->produces,
            message: 'A list of MIME types the operation can produce. This overrides the produces definition at the Swagger Object. An empty value MAY be used to clear the global definition. Value MUST be as described under Mime Types.'
        );
    }

    #[Test] public function string(): void
    {
        $Operation = Operation::from([
            Operation::produces => ['application/x-www-form-urlencoded'],
            Operation::responses => ['example1' => [Reference::ref => 'ref']]
        ]);

        self::assertEquals(
            expected: ['application/x-www-form-urlencoded'],
            actual: $Operation->produces,
            message: 'A list of MIME types the operation can produce. This overrides the produces definition at the Swagger Object. An empty value MAY be used to clear the global definition. Value MUST be as described under Mime Types.'
        );
    }
}