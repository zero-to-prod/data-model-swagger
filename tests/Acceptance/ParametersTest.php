<?php

namespace Tests\Acceptance;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelSwagger\Operation;

class ParametersTest extends TestCase
{
    #[Test] public function test(): void
    {
        $json = <<<JSON
        {
          "responses": [],
          "parameters": {
            "skipParam": {
                "name": "skip",
                "in": "query",
                "description": "number of items to skip",
                "required": true,
                "type": "integer",
                "format": "int32"
          },
          "limitParam": {
                "name": "limit",
                "in": "query",
                "description": "max records to return",
                "required": true,
                "type": "integer",
                "format": "int32"
              }
          }
        }
        JSON;

        $Operation = Operation::from(json_decode($json, true));

        // Test skipParam
        self::assertEquals(
            expected: 'skip',
            actual: $Operation->parameters['skipParam']->name,
        );
        self::assertEquals(
            expected: 'query',
            actual: $Operation->parameters['skipParam']->in
        );
        self::assertEquals(
            expected: 'number of items to skip',
            actual: $Operation->parameters['skipParam']->description
        );
        self::assertTrue($Operation->parameters['skipParam']->required);
        self::assertEquals(
            expected: 'integer',
            actual: $Operation->parameters['skipParam']->type
        );
        self::assertEquals(
            expected: 'int32',
            actual: $Operation->parameters['skipParam']->format
        );

        // Test limitParam
        self::assertEquals(
            expected: 'limit',
            actual: $Operation->parameters['limitParam']->name
        );
        self::assertEquals(
            expected: 'query',
            actual: $Operation->parameters['limitParam']->in
        );
        self::assertEquals(
            expected: 'max records to return',
            actual: $Operation->parameters['limitParam']->description
        );
        self::assertTrue($Operation->parameters['limitParam']->required);
        self::assertEquals(
            expected: 'integer',
            actual: $Operation->parameters['limitParam']->type
        );
        self::assertEquals(
            expected: 'int32',
            actual: $Operation->parameters['limitParam']->format
        );

        // Test parameters structure
        self::assertIsArray($Operation->parameters);
        self::assertCount(2, $Operation->parameters);
        self::assertArrayHasKey('skipParam', $Operation->parameters);
        self::assertArrayHasKey('limitParam', $Operation->parameters);
    }
}