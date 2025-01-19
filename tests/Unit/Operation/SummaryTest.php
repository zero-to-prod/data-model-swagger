<?php

namespace Tests\Unit\Operation;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelSwagger\Operation;
use Zerotoprod\DataModelSwagger\Reference;

class SummaryTest extends TestCase
{

    #[Test] public function nullable(): void
    {
        $Operation = Operation::from([Operation::responses => ['example1' => [Reference::ref => 'ref']]]);

        self::assertNull(
            actual: $Operation->summary,
            message: 'A short summary of what the operation does.'
        );
    }

    #[Test] public function string(): void
    {
        $Operation = Operation::from([
            Operation::summary => 'summary',
            Operation::responses => ['example1' => [Reference::ref => 'ref']]
        ]);

        self::assertEquals(
            expected: 'summary',
            actual: $Operation->summary,
            message: 'A short summary of what the operation does.'
        );
    }
}