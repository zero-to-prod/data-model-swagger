<?php

namespace Tests\Acceptance;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelSwagger\Swagger;

class DefinitionsTest extends TestCase
{
    #[Test]
    public function test(): void
    {
        $json = <<<JSON
        {
          "swagger": "",
          "info": "",
          "paths": [],
          "definitions": {
              "Category": {
                "type": "object",
                "properties": {
                  "id": {
                    "type": "integer",
                    "format": "int64"
                  },
                  "name": {
                    "type": "string"
                  }
                }
              },
              "Tag": {
                "type": "object",
                "properties": {
                  "id": {
                    "type": "integer",
                    "format": "int64"
                  },
                  "name": {
                    "type": "string"
                  }
                }
              }
          }
        }
        JSON;

        $Swagger = Swagger::from(json_decode($json, true));

        // Test Category definition
        self::assertEquals(
            expected: 'object',
            actual: $Swagger->definitions['Category']->type
        );

        self::assertIsArray($Swagger->definitions['Category']->properties);
        self::assertCount(2, $Swagger->definitions['Category']->properties);
        self::assertArrayHasKey('id', $Swagger->definitions['Category']->properties);
        self::assertArrayHasKey('name', $Swagger->definitions['Category']->properties);

        $categoryId = $Swagger->definitions['Category']->properties['id'];
        self::assertEquals('integer', $categoryId->type);
        self::assertEquals('int64', $categoryId->format);

        $categoryName = $Swagger->definitions['Category']->properties['name'];
        self::assertEquals('string', $categoryName->type);

        // Test Tag definition
        self::assertEquals(
            expected: 'object',
            actual: $Swagger->definitions['Tag']->type
        );

        self::assertIsArray($Swagger->definitions['Tag']->properties);
        self::assertCount(2, $Swagger->definitions['Tag']->properties);
        self::assertArrayHasKey('id', $Swagger->definitions['Tag']->properties);
        self::assertArrayHasKey('name', $Swagger->definitions['Tag']->properties);

        $tagId = $Swagger->definitions['Tag']->properties['id'];
        self::assertEquals('integer', $tagId->type);
        self::assertEquals('int64', $tagId->format);

        $tagName = $Swagger->definitions['Tag']->properties['name'];
        self::assertEquals('string', $tagName->type);
    }
}