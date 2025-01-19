<?php

namespace Tests\Unit\Operation;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelSwagger\Operation;
use Zerotoprod\DataModelSwagger\Reference;

class DescriptionTest extends TestCase
{
    #[Test] public function nullable(): void
    {
        $Operation = Operation::from([Operation::responses => ['example1' => [Reference::ref => 'ref']]]);

        self::assertNull(
            actual: $Operation->description,
            message: 'A verbose explanation of the operation behavior. [CommonMark] syntax MAY be used for rich text representation.'
        );
    }

    #[Test] public function string(): void
    {
        $Operation = Operation::from([
            Operation::description => 'description',
            Operation::responses => ['example1' => [Reference::ref => 'ref']]
        ]);

        self::assertEquals(
            expected: 'description',
            actual: $Operation->description,
            message: 'A verbose explanation of the operation behavior. [CommonMark] syntax MAY be used for rich text representation.'
        );
    }
}