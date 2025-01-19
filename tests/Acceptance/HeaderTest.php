<?php

namespace Tests\Acceptance;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelSwagger\Response;

class HeaderTest extends TestCase
{
    #[Test] public function test(): void
    {
        $json = <<<JSON
        {
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
        JSON;

        $Response = Response::from(json_decode($json, true));

        self::assertEquals(
            expected: 'The number of allowed requests in the current period',
            actual: $Response->headers['X-Rate-Limit-Limit']->description,
        );
        self::assertEquals(
            expected: 'integer',
            actual: $Response->headers['X-Rate-Limit-Limit']->type,
        );
        self::assertEquals(
            expected: 'The number of remaining requests in the current period',
            actual: $Response->headers['X-Rate-Limit-Remaining']->description,
        );
        self::assertEquals(
            expected: 'integer',
            actual: $Response->headers['X-Rate-Limit-Remaining']->type,
        );
        self::assertEquals(
            expected: 'The number of seconds left in the current period',
            actual: $Response->headers['X-Rate-Limit-Reset']->description,
        );
        self::assertEquals(
            expected: 'integer',
            actual: $Response->headers['X-Rate-Limit-Reset']->type,
        );
    }

    #[Test] public function a_simple_header_with_of_an_integer_type(): void
    {
        $json = <<<JSON
        {
          "headers": {
            "X-Rate-Limit-Limit": {
              "description": "The number of allowed requests in the current period",
              "type": "integer"
            }
          }
        }
        JSON;

        $Response = Response::from(json_decode($json, true));

        self::assertEquals(
            expected: 'The number of allowed requests in the current period',
            actual: $Response->headers['X-Rate-Limit-Limit']->description,
        );
        self::assertEquals(
            expected: 'integer',
            actual: $Response->headers['X-Rate-Limit-Limit']->type,
        );
    }
}