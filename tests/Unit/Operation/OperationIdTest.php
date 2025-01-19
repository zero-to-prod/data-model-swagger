<?php

namespace Tests\Unit\Operation;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelSwagger\Operation;
use Zerotoprod\DataModelSwagger\Reference;

class OperationIdTest extends TestCase
{
    #[Test] public function nullable(): void
    {
        $Operation = Operation::from([Operation::responses => ['example1' => [Reference::ref => 'ref']]]);

        self::assertNull(
            actual: $Operation->operationId,
            message: 'A verbose explanation of the operation behavior. [CommonMark] syntax MAY be used for rich text representation.'
        );
    }

    #[Test] public function string(): void
    {
        $Operation = Operation::from([
            Operation::operationId => 'operationId',
            Operation::responses => ['example1' => [Reference::ref => 'ref']]
        ]);

        self::assertEquals(
            expected: 'operationId',
            actual: $Operation->operationId,
            message: 'A verbose explanation of the operation behavior. [CommonMark] syntax MAY be used for rich text representation.'
        );
    }
}