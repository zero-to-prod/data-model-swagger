<?php

namespace Tests\Acceptance;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelSwagger\Swagger;

class PathItemTest extends TestCase
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
                    "description": "Returns pets based on ID",
                    "summary": "Find pets by ID",
                    "operationId": "getPetsById",
                    "produces": [
                      "application/json",
                      "text/html"
                    ],
                    "responses": {
                      "200": {
                        "description": "pet response",
                        "schema": {
                          "type": "array",
                          "items": {
                            "\$ref": "#/definitions/Pet"
                          }
                        }
                      },
                      "default": {
                        "description": "error payload",
                        "schema": {
                          "\$ref": "#/definitions/ErrorModel"
                        }
                      }
                    }
                  },
                  "parameters": [
                    {
                      "name": "id",
                      "in": "path",
                      "description": "ID of pet to use",
                      "required": true,
                      "type": "array",
                      "items": {
                        "type": "string"
                      },
                      "collectionFormat": "csv"
                    }
                  ]
              }
          }
        }
        JSON;

        $Swagger = Swagger::from(json_decode($json, true));

        self::assertEquals(
            expected: 'Returns pets based on ID',
            actual: $Swagger->paths['/pets']->get->description,
        );
        self::assertEquals(
            expected: 'Find pets by ID',
            actual: $Swagger->paths['/pets']->get->summary,
        );
        self::assertEquals(
            expected: 'getPetsById',
            actual: $Swagger->paths['/pets']->get->operationId,
        );
        self::assertEquals(
            expected: 'application/json',
            actual: $Swagger->paths['/pets']->get->produces[0],
        );
        self::assertEquals(
            expected: 'text/html',
            actual: $Swagger->paths['/pets']->get->produces[1],
        );
        self::assertEquals(
            expected: 'pet response',
            actual: $Swagger->paths['/pets']->get->responses['200']->description,
        );
        self::assertEquals(
            expected: 'array',
            actual: $Swagger->paths['/pets']->get->responses['200']->schema->type,
        );
        self::assertEquals(
            expected: '#/definitions/Pet',
            actual: $Swagger->paths['/pets']->get->responses['200']->schema->items->ref,
        );
        self::assertEquals(
            expected: 'error payload',
            actual: $Swagger->paths['/pets']->get->responses['default']->description,
        );
        self::assertEquals(
            expected: '#/definitions/ErrorModel',
            actual: $Swagger->paths['/pets']->get->responses['default']->schema->ref,
        );
        self::assertEquals(
            expected: 'id',
            actual: $Swagger->paths['/pets']->parameters[0]->name,
        );
        self::assertEquals(
            expected: 'path',
            actual: $Swagger->paths['/pets']->parameters[0]->in,
        );
        self::assertEquals(
            expected: 'ID of pet to use',
            actual: $Swagger->paths['/pets']->parameters[0]->description,
        );
        self::assertTrue(
            condition: $Swagger->paths['/pets']->parameters[0]->required,
        );
        self::assertEquals(
            expected: 'array',
            actual: $Swagger->paths['/pets']->parameters[0]->type,
        );
        self::assertEquals(
            expected: 'string',
            actual: $Swagger->paths['/pets']->parameters[0]->items->type,
        );
        self::assertEquals(
            expected: 'csv',
            actual: $Swagger->paths['/pets']->parameters[0]->collectionFormat,
        );
    }
}