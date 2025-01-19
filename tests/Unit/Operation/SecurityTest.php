<?php

namespace Tests\Unit\Operation;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelSwagger\Operation;
use Zerotoprod\DataModelSwagger\Reference;

class SecurityTest extends TestCase
{

    #[Test] public function nullable(): void
    {
        $Operation = Operation::from([Operation::responses => ['example1' => [Reference::ref => 'ref']]]);

        self::assertEmpty(
            actual: $Operation->security,
            message: 'A declaration of which security mechanisms can be used for this operation.'
        );
    }

    #[Test] public function security(): void
    {
        $Operation = Operation::from([
            Operation::security => ['auth' => ["write:users", "read:users"]],
            Operation::responses => ['example1' => [Reference::ref => 'ref']]
        ]);

        self::assertEquals(
            expected: ["write:users", "read:users"],
            actual: $Operation->security['auth'],
            message: 'A declaration of which security mechanisms can be used for this operation.'
        );
    }
}