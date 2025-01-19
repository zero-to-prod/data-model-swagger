<?php

namespace Tests\Acceptance;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelSwagger\Swagger;

class PathsTest extends TestCase
{
    #[Test] public function test(): void
    {
        $json = <<<JSON
        {
          "swagger": "3.0.3",
          "info": {
            "title": "title",
            "version": "version"
          },
          "paths": {
            "/pets": {
                "get": {
                  "description": "Returns all pets from the system that the user has access to",
                  "produces": [
                    "application/json"
                  ],
                  "responses": {
                    "200": {
                      "description": "A list of pets.",
                      "schema": {
                        "type": "array",
                        "items": {
                          "\$ref": "#/definitions/pet"
                        }
                      }
                    }
                  }
                }
              }
          }
        }
        JSON;

        $Swagger = Swagger::from(json_decode($json, true));

        self::assertEquals(
            expected: 'Returns all pets from the system that the user has access to',
            actual: $Swagger->paths['/pets']->get->description,
        );
        self::assertEquals(
            expected: 'application/json',
            actual: $Swagger->paths['/pets']->get->produces[0],
        );
        self::assertEquals(
            expected: 'A list of pets.',
            actual: $Swagger->paths['/pets']->get->responses['200']->description,
        );
        self::assertEquals(
            expected: 'array',
            actual: $Swagger->paths['/pets']->get->responses['200']->schema->type,
        );
        self::assertEquals(
            expected: '#/definitions/pet',
            actual: $Swagger->paths['/pets']->get->responses['200']->schema->items->ref,
        );
    }
}