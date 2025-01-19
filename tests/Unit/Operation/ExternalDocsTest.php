<?php

namespace Tests\Unit\Operation;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelSwagger\ExternalDocumentation;
use Zerotoprod\DataModelSwagger\Operation;
use Zerotoprod\DataModelSwagger\Reference;

class ExternalDocsTest extends TestCase
{

    #[Test] public function nullable(): void
    {
        $Operation = Operation::from([Operation::responses => ['example1' => [Reference::ref => 'ref']]]);

        self::assertNull(
            actual: $Operation->externalDocs,
            message: 'Additional external documentation for this schema.'
        );
    }

    #[Test] public function string(): void
    {
        $Operation = Operation::from([
            Operation::externalDocs => [
                ExternalDocumentation::url => 'https://example.com',
            ],
            Operation::responses => ['example1' => [Reference::ref => 'ref']]
        ]);

        self::assertEquals(
            expected: 'https://example.com',
            actual: $Operation->externalDocs->url,
            message: 'Additional external documentation for this schema.'
        );
    }
}