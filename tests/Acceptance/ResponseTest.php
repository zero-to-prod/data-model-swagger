<?php

namespace Tests\Acceptance;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelSwagger\Operation;

class ResponseTest extends TestCase
{
    #[Test] public function test(): void
    {
        $json = <<<JSON
        {
          "responses": {
              "200": {
                "description": "a pet to be returned",
                "schema": {
                  "\$ref": "#/definitions/Pet"
                }
              },
              "default": {
                "description": "Unexpected error",
                "schema": {
                  "\$ref": "#/definitions/ErrorModel"
                }
              }
          }
        }
        JSON;

        $Operation = Operation::from(json_decode($json, true));

        self::assertEquals(
            expected: 'a pet to be returned',
            actual: $Operation->responses['200']->description,
        );
        self::assertEquals(
            expected: '#/definitions/Pet',
            actual: $Operation->responses['200']->schema->ref,
        );
        self::assertEquals(
            expected: 'Unexpected error',
            actual: $Operation->responses['default']->description,
        );
        self::assertEquals(
            expected: '#/definitions/ErrorModel',
            actual: $Operation->responses['default']->schema->ref,
        );
    }

    #[Test] public function complex_type(): void
    {
        $json = <<<JSON
        {
          "responses": {
              "200": {
                  "description": "A complex object array response",
                  "schema": {
                    "type": "array",
                    "items": {
                      "\$ref": "#/definitions/VeryComplexType"
                    }
                  }
              }
          }
        }
        JSON;

        $Operation = Operation::from(json_decode($json, true));

        self::assertEquals(
            expected: 'A complex object array response',
            actual: $Operation->responses['200']->description,
        );
        self::assertEquals(
            expected: 'array',
            actual: $Operation->responses['200']->schema->type,
        );
        self::assertEquals(
            expected: '#/definitions/VeryComplexType',
            actual: $Operation->responses['200']->schema->items->ref,
        );
    }

    #[Test] public function string_type(): void
    {
        $json = <<<JSON
        {
          "responses": {
              "200": {
                "description": "A simple string response",
                 "schema": {
                   "type": "string"
                 }
              }
          }
        }
        JSON;

        $Operation = Operation::from(json_decode($json, true));

        self::assertEquals(
            expected: 'A simple string response',
            actual: $Operation->responses['200']->description,
        );
        self::assertEquals(
            expected: 'string',
            actual: $Operation->responses['200']->schema->type,
        );
    }

    #[Test] public function with_headers(): void
    {
        $json = <<<JSON
        {
          "responses": {
              "200": {
                  "description": "A simple string response",
                  "schema": {
                    "type": "string"
                  },
                  "headers": {
                    "X-Rate-Limit-Limit": {
                      "description": "The number of allowed requests in the current period",
                      "type": "integer"
                    },
                    "X-Rate-Limit-Remaining": {
                      "description": "The number of remaining requests in the current period",
                      "type": "integer"
                    },
                    "X-Rate-Limit-Reset": {
                      "description": "The number of seconds left in the current period",
                      "type": "integer"
                    }
                  }
              }
          }
        }
        JSON;

        $Operation = Operation::from(json_decode($json, true));

        self::assertEquals(
            expected: 'A simple string response',
            actual: $Operation->responses['200']->description,
        );
        self::assertEquals(
            expected: 'string',
            actual: $Operation->responses['200']->schema->type,
        );
        self::assertEquals(
            expected: 'The number of allowed requests in the current period',
            actual: $Operation->responses['200']->headers['X-Rate-Limit-Limit']->description,
        );
        self::assertEquals(
            expected: 'integer',
            actual: $Operation->responses['200']->headers['X-Rate-Limit-Limit']->type,
        );
        self::assertEquals(
            expected: 'The number of remaining requests in the current period',
            actual: $Operation->responses['200']->headers['X-Rate-Limit-Remaining']->description,
        );
        self::assertEquals(
            expected: 'integer',
            actual: $Operation->responses['200']->headers['X-Rate-Limit-Remaining']->type,
        );
        self::assertEquals(
            expected: 'The number of seconds left in the current period',
            actual: $Operation->responses['200']->headers['X-Rate-Limit-Reset']->description,
        );
        self::assertEquals(
            expected: 'integer',
            actual: $Operation->responses['200']->headers['X-Rate-Limit-Reset']->type,
        );
    }

    #[Test] public function no_return_value(): void
    {
        $json = <<<JSON
        {
          "responses": {
              "200": {
                "description": "object created"
              }
          }
        }
        JSON;

        $Operation = Operation::from(json_decode($json, true));

        self::assertEquals(
            expected: 'object created',
            actual: $Operation->responses['200']->description,
        );
    }
}