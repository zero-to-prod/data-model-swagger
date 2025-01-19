<?php

namespace Tests\Unit\Operation;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelSwagger\Operation;
use Zerotoprod\DataModelSwagger\Reference;

class DeprecatedTest extends TestCase
{

    #[Test] public function default(): void
    {
        $Operation = Operation::from([Operation::responses => ['example1' => [Reference::ref => 'ref']]]);

        self::assertFalse(
            condition: $Operation->deprecated,
            message: 'Declares this operation to be deprecated. Consumers SHOULD refrain from usage of the declared operation. Default value is false.'
        );
    }

    #[Test] public function false(): void
    {
        $Operation = Operation::from([
            Operation::deprecated => false,
            Operation::responses => ['example1' => [Reference::ref => 'ref']]
        ]);

        self::assertFalse(
            condition: $Operation->deprecated,
            message: 'Declares this operation to be deprecated. Consumers SHOULD refrain from usage of the declared operation. Default value is false.'
        );
    }

    #[Test] public function true(): void
    {
        $Operation = Operation::from([
            Operation::deprecated => true,
            Operation::responses => ['example1' => [Reference::ref => 'ref']]
        ]);

        self::assertTrue(
            condition: $Operation->deprecated,
            message: 'Declares this operation to be deprecated. Consumers SHOULD refrain from usage of the declared operation. Default value is false.'
        );
    }
}