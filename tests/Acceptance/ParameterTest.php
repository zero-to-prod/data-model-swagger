<?php

namespace Tests\Acceptance;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelSwagger\Parameter;

class ParameterTest extends TestCase
{
    #[Test] public function test(): void
    {
        $json = <<<JSON
        {
          "name": "user",
          "type": "string",
          "in": "body",
          "description": "user to add to the system",
          "required": true,
          "schema": {
            "\$ref": "#/definitions/User"
          }
        }
        JSON;

        $Parameter = Parameter::from(json_decode($json, true));

        self::assertEquals(
            expected: 'user',
            actual: $Parameter->name,
        );
        self::assertEquals(
            expected: 'string',
            actual: $Parameter->type,
        );
        self::assertEquals(
            expected: 'body',
            actual: $Parameter->in,
        );
        self::assertEquals(
            expected: 'user to add to the system',
            actual: $Parameter->description,
        );
        self::assertTrue(
            condition: $Parameter->required,
        );
        self::assertEquals(
            expected: '#/definitions/User',
            actual: $Parameter->schema->ref,
        );
    }

    #[Test] public function array_of_string_values(): void
    {
        $json = <<<JSON
        {
          "name": "user",
          "type": "string",
          "in": "body",
          "description": "user to add to the system",
          "required": true,
          "schema": {
            "type": "array",
            "items": {
              "type": "string"
            }
          }
        }
        JSON;

        $Parameter = Parameter::from(json_decode($json, true));

        self::assertEquals(
            expected: 'user',
            actual: $Parameter->name,
        );
        self::assertEquals(
            expected: 'string',
            actual: $Parameter->type,
        );
        self::assertEquals(
            expected: 'body',
            actual: $Parameter->in,
        );
        self::assertEquals(
            expected: 'user to add to the system',
            actual: $Parameter->description,
        );
        self::assertTrue(
            condition: $Parameter->required,
        );
        self::assertEquals(
            expected: 'array',
            actual: $Parameter->schema->type,
        );
        self::assertEquals(
            expected: 'string',
            actual: $Parameter->schema->items->type,
        );
    }

    #[Test] public function header_parameter_with_an_array_of_64_bit_integer_numbers(): void
    {
        $json = <<<JSON
        {
          "name": "token",
          "in": "header",
          "description": "token to be passed as a header",
          "required": true,
          "type": "array",
          "items": {
            "type": "integer",
            "format": "int64"
          },
          "collectionFormat": "csv"
        }
        JSON;

        $Parameter = Parameter::from(json_decode($json, true));

        self::assertEquals(
            expected: 'token',
            actual: $Parameter->name,
        );
        self::assertEquals(
            expected: 'array',
            actual: $Parameter->type,
        );
        self::assertEquals(
            expected: 'header',
            actual: $Parameter->in,
        );
        self::assertEquals(
            expected: 'token to be passed as a header',
            actual: $Parameter->description,
        );
        self::assertTrue(
            condition: $Parameter->required,
        );
        self::assertEquals(
            expected: 'integer',
            actual: $Parameter->items->type,
        );
        self::assertEquals(
            expected: 'int64',
            actual: $Parameter->items->format,
        );
    }

    #[Test] public function a_path_parameter_of_a_string_value(): void
    {
        $json = <<<JSON
        {
          "name": "username",
          "in": "path",
          "description": "username to fetch",
          "required": true,
          "type": "string"
        }
        JSON;

        $Parameter = Parameter::from(json_decode($json, true));

        self::assertEquals(
            expected: 'username',
            actual: $Parameter->name,
        );
        self::assertEquals(
            expected: 'string',
            actual: $Parameter->type,
        );
        self::assertEquals(
            expected: 'path',
            actual: $Parameter->in,
        );
        self::assertEquals(
            expected: 'username to fetch',
            actual: $Parameter->description,
        );
        self::assertTrue(
            condition: $Parameter->required,
        );
    }

    #[Test] public function an_optional_query_parameter_of_a_string_value_allowing_multiple_values_by_repeating_the_query_parameter(): void
    {
        $json = <<<JSON
        {
          "name": "id",
          "in": "query",
          "description": "ID of the object to fetch",
          "required": false,
          "type": "array",
          "items": {
            "type": "string"
          },
          "collectionFormat": "multi"
        }
        JSON;

        $Parameter = Parameter::from(json_decode($json, true));

        self::assertEquals(
            expected: 'id',
            actual: $Parameter->name,
        );
        self::assertEquals(
            expected: 'array',
            actual: $Parameter->type,
        );
        self::assertEquals(
            expected: 'query',
            actual: $Parameter->in,
        );
        self::assertEquals(
            expected: 'ID of the object to fetch',
            actual: $Parameter->description,
        );
        self::assertFalse(
            condition: $Parameter->required,
        );
        self::assertEquals(
            expected: 'string',
            actual: $Parameter->items->type,
        );
        self::assertEquals(
            expected: 'multi',
            actual: $Parameter->collectionFormat,
        );
    }
    #[Test] public function a_form_data_with_file_type_for_a_file_upload(): void
    {
        $json = <<<JSON
        {
          "name": "avatar",
          "in": "formData",
          "description": "The avatar of the user",
          "required": true,
          "type": "file"
        }
        JSON;

        $Parameter = Parameter::from(json_decode($json, true));

        self::assertEquals(
            expected: 'avatar',
            actual: $Parameter->name,
        );
        self::assertEquals(
            expected: 'file',
            actual: $Parameter->type,
        );
        self::assertEquals(
            expected: 'formData',
            actual: $Parameter->in,
        );
        self::assertEquals(
            expected: 'The avatar of the user',
            actual: $Parameter->description,
        );
    }
}