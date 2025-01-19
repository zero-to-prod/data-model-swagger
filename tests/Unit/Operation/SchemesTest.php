<?php

namespace Tests\Unit\Operation;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelSwagger\Operation;
use Zerotoprod\DataModelSwagger\Reference;

class SchemesTest extends TestCase
{
    #[Test] public function nullable(): void
    {
        $Operation = Operation::from([Operation::responses => ['example1' => [Reference::ref => 'ref']]]);

        self::assertEquals(
            expected: [],
            actual: $Operation->schemes,
            message: 'The transfer protocol for the operation. Values MUST be from the list: "http", "https", "ws", "wss". The value overrides the Swagger Object schemes definition.'
        );
    }

    #[Test] public function string(): void
    {
        $Operation = Operation::from([
            Operation::responses => ['example1' => [Reference::ref => 'ref']],
            Operation::schemes => ['http']
        ]);

        self::assertEquals(
            expected: ['http'],
            actual: $Operation->schemes,
            message: 'The transfer protocol for the operation. Values MUST be from the list: "http", "https", "ws", "wss". The value overrides the Swagger Object schemes definition.'
        );
    }
}