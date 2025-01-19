<?php

namespace Tests\Acceptance;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelSwagger\Schema;
use Zerotoprod\DataModelSwagger\Swagger;

class SchemaTest extends TestCase
{
    #[Test] public function test(): void
    {
        $json = <<<JSON
        {
          "type": "object",
          "required": [
            "name"
          ],
          "properties": {
            "name": {
              "type": "string"
            },
            "address": {
              "\$ref": "#/definitions/Address"
            },
            "age": {
              "type": "integer",
              "format": "int32",
              "minimum": 0
            }
          }
        }
        JSON;

        $Schema = Schema::from(json_decode($json, true));

        self::assertEquals(
            expected: 'object',
            actual: $Schema->type,
        );
        self::assertIsArray($Schema->required);
        self::assertCount(1, $Schema->required);
        self::assertEquals(
            expected: ['name'],
            actual: $Schema->required
        );
        self::assertIsArray($Schema->properties);
        self::assertCount(3, $Schema->properties);
        self::assertArrayHasKey('name', $Schema->properties);
        self::assertArrayHasKey('address', $Schema->properties);
        self::assertArrayHasKey('age', $Schema->properties);
        self::assertInstanceOf(Schema::class, $Schema->properties['name']);
        self::assertEquals(
            expected: 'string',
            actual: $Schema->properties['name']->type
        );
        self::assertInstanceOf(Schema::class, $Schema->properties['address']);
        self::assertEquals(
            expected: '#/definitions/Address',
            actual: $Schema->properties['address']->ref
        );

        self::assertInstanceOf(Schema::class, $Schema->properties['age']);
        self::assertEquals(
            expected: 'integer',
            actual: $Schema->properties['age']->type
        );
        self::assertEquals(
            expected: 'int32',
            actual: $Schema->properties['age']->format
        );
        self::assertEquals(
            expected: 0,
            actual: $Schema->properties['age']->minimum
        );
    }

    #[Test] public function a_simple_string_to_string_mapping(): void
    {
        $json = <<<JSON
        {
          "type": "object",
          "additionalProperties": {
            "type": "string"
          }
        }
        JSON;

        $Schema = Schema::from(json_decode($json, true));

        self::assertEquals(
            expected: 'object',
            actual: $Schema->type,
        );
        self::assertEquals(
            expected: 'string',
            actual: $Schema->additionalProperties->type,
        );
    }

    #[Test] public function a_string_to_model_mapping(): void
    {
        $json = <<<JSON
        {
          "type": "object",
          "additionalProperties": {
            "\$ref": "#/definitions/ComplexModel"
          }
        }
        JSON;

        $Schema = Schema::from(json_decode($json, true));

        self::assertEquals(
            expected: 'object',
            actual: $Schema->type,
        );
        self::assertEquals(
            expected: '#/definitions/ComplexModel',
            actual: $Schema->additionalProperties->ref,
        );
    }

    #[Test] public function model_with_example(): void
    {
        $json = <<<JSON
        {
          "type": "object",
          "properties": {
            "id": {
              "type": "integer",
              "format": "int64"
            },
            "name": {
              "type": "string"
            }
          },
          "required": [
            "name"
          ],
          "example": {
            "name": "Puma",
            "id": 1
          }
        }
        JSON;

        $Schema = Schema::from(json_decode($json, true));

        self::assertEquals(
            expected: 'object',
            actual: $Schema->type,
        );
        self::assertIsArray($Schema->properties);
        self::assertCount(2, $Schema->properties);
        self::assertArrayHasKey('id', $Schema->properties);
        self::assertArrayHasKey('name', $Schema->properties);
        self::assertInstanceOf(Schema::class, $Schema->properties['id']);
        self::assertEquals(
            expected: 'integer',
            actual: $Schema->properties['id']->type
        );
        self::assertEquals(
            expected: 'int64',
            actual: $Schema->properties['id']->format
        );
        self::assertInstanceOf(Schema::class, $Schema->properties['name']);
        self::assertEquals(
            expected: 'string',
            actual: $Schema->properties['name']->type
        );
        self::assertIsArray($Schema->required);
        self::assertCount(1, $Schema->required);
        self::assertEquals(
            expected: ['name'],
            actual: $Schema->required
        );
        self::assertIsArray($Schema->example);
        self::assertCount(2, $Schema->example);
        self::assertArrayHasKey('name', $Schema->example);
        self::assertArrayHasKey('id', $Schema->example);
        self::assertEquals(
            expected: 'Puma',
            actual: $Schema->example['name']
        );
        self::assertEquals(
            expected: 1,
            actual: $Schema->example['id']
        );
    }

    #[Test]
    public function models_with_composition(): void
    {
        $json = <<<JSON
        {
          "swagger": "",
          "info": "",
          "paths": [],
          "definitions": {
            "ErrorModel": {
              "type": "object",
              "required": [
                "message",
                "code"
              ],
              "properties": {
                "message": {
                  "type": "string"
                },
                "code": {
                  "type": "integer",
                  "minimum": 100,
                  "maximum": 600
                }
              }
            },
            "ExtendedErrorModel": {
              "allOf": [
                {
                  "\$ref": "#/definitions/ErrorModel"
                },
                {
                  "type": "object",
                  "required": [
                    "rootCause"
                  ],
                  "properties": {
                    "rootCause": {
                      "type": "string"
                    }
                  }
                }
              ]
            }
          }
        }
        JSON;

        $Swagger = Swagger::from(json_decode($json, true));

        self::assertArrayHasKey('ErrorModel', $Swagger->definitions);
        self::assertEquals(
            expected: 'object',
            actual: $Swagger->definitions['ErrorModel']->type,
        );
        self::assertIsArray($Swagger->definitions['ErrorModel']->required);
        self::assertCount(2, $Swagger->definitions['ErrorModel']->required);
        self::assertEquals(
            expected: ['message', 'code'],
            actual: $Swagger->definitions['ErrorModel']->required
        );
        self::assertIsArray($Swagger->definitions['ErrorModel']->properties);
        self::assertCount(2, $Swagger->definitions['ErrorModel']->properties);
        self::assertArrayHasKey('message', $Swagger->definitions['ErrorModel']->properties);
        self::assertInstanceOf(Schema::class, $Swagger->definitions['ErrorModel']->properties['message']);
        self::assertEquals(
            expected: 'string',
            actual: $Swagger->definitions['ErrorModel']->properties['message']->type
        );
        self::assertArrayHasKey('code', $Swagger->definitions['ErrorModel']->properties);
        self::assertInstanceOf(Schema::class, $Swagger->definitions['ErrorModel']->properties['code']);
        self::assertEquals(
            expected: 'integer',
            actual: $Swagger->definitions['ErrorModel']->properties['code']->type
        );
        self::assertEquals(
            expected: 100,
            actual: $Swagger->definitions['ErrorModel']->properties['code']->minimum
        );
        self::assertEquals(
            expected: 600,
            actual: $Swagger->definitions['ErrorModel']->properties['code']->maximum
        );
        self::assertArrayHasKey('ExtendedErrorModel', $Swagger->definitions);
        self::assertIsArray($Swagger->definitions['ExtendedErrorModel']->allOf);
        self::assertCount(2, $Swagger->definitions['ExtendedErrorModel']->allOf);
        self::assertInstanceOf(Schema::class, $Swagger->definitions['ExtendedErrorModel']->allOf[0]);
        self::assertEquals(
            expected: '#/definitions/ErrorModel',
            actual: $Swagger->definitions['ExtendedErrorModel']->allOf[0]->ref
        );
        self::assertInstanceOf(Schema::class, $Swagger->definitions['ExtendedErrorModel']->allOf[1]);
        self::assertEquals(
            expected: 'object',
            actual: $Swagger->definitions['ExtendedErrorModel']->allOf[1]->type
        );
        self::assertIsArray($Swagger->definitions['ExtendedErrorModel']->allOf[1]->required);
        self::assertCount(1, $Swagger->definitions['ExtendedErrorModel']->allOf[1]->required);
        self::assertEquals(
            expected: ['rootCause'],
            actual: $Swagger->definitions['ExtendedErrorModel']->allOf[1]->required
        );
        self::assertIsArray($Swagger->definitions['ExtendedErrorModel']->allOf[1]->properties);
        self::assertArrayHasKey('rootCause', $Swagger->definitions['ExtendedErrorModel']->allOf[1]->properties);
        self::assertInstanceOf(
            Schema::class,
            $Swagger->definitions['ExtendedErrorModel']->allOf[1]->properties['rootCause']
        );
        self::assertEquals(
            expected: 'string',
            actual: $Swagger->definitions['ExtendedErrorModel']->allOf[1]->properties['rootCause']->type
        );
    }

    #[Test] public function models_with_polymorphism_support(): void
    {
        $json = <<<JSON
        {
          "swagger": "",
          "info": "",
          "paths": [],
          "definitions": {
            "Pet": {
              "type": "object",
              "discriminator": "petType",
              "properties": {
                "name": {
                  "type": "string"
                },
                "petType": {
                  "type": "string"
                }
              },
              "required": [
                "name",
                "petType"
              ]
            },
            "Cat": {
              "description": "A representation of a cat",
              "allOf": [
                {
                  "\$ref": "#/definitions/Pet"
                },
                {
                  "type": "object",
                  "properties": {
                    "huntingSkill": {
                      "type": "string",
                      "description": "The measured skill for hunting",
                      "default": "lazy",
                      "enum": [
                        "clueless",
                        "lazy",
                        "adventurous",
                        "aggressive"
                      ]
                    }
                  },
                  "required": [
                    "huntingSkill"
                  ]
                }
              ]
            },
            "Dog": {
              "description": "A representation of a dog",
              "allOf": [
                {
                  "\$ref": "#/definitions/Pet"
                },
                {
                  "type": "object",
                  "properties": {
                    "packSize": {
                      "type": "integer",
                      "format": "int32",
                      "description": "the size of the pack the dog is from",
                      "default": 0,
                      "minimum": 0
                    }
                  },
                  "required": [
                    "packSize"
                  ]
                }
              ]
            }
          }
        }
        JSON;

        $Swagger = Swagger::from(json_decode($json, true));

        // Test Pet base model structure
        self::assertEquals(
            expected: 'object',
            actual: $Swagger->definitions['Pet']->type
        );
        self::assertEquals(
            expected: 'petType',
            actual: $Swagger->definitions['Pet']->discriminator
        );

        // Test Pet properties
        self::assertIsArray($Swagger->definitions['Pet']->properties);
        self::assertCount(2, $Swagger->definitions['Pet']->properties);

        // Test name property
        self::assertArrayHasKey('name', $Swagger->definitions['Pet']->properties);
        self::assertInstanceOf(Schema::class, $Swagger->definitions['Pet']->properties['name']);
        self::assertEquals(
            expected: 'string',
            actual: $Swagger->definitions['Pet']->properties['name']->type
        );

        // Test petType property
        self::assertArrayHasKey('petType', $Swagger->definitions['Pet']->properties);
        self::assertInstanceOf(Schema::class, $Swagger->definitions['Pet']->properties['petType']);
        self::assertEquals(
            expected: 'string',
            actual: $Swagger->definitions['Pet']->properties['petType']->type
        );

        // Test Pet required fields
        self::assertIsArray($Swagger->definitions['Pet']->required);
        self::assertCount(2, $Swagger->definitions['Pet']->required);
        self::assertEquals(
            expected: ['name', 'petType'],
            actual: $Swagger->definitions['Pet']->required
        );

        // Test Cat model
        self::assertArrayHasKey('Cat', $Swagger->definitions);
        self::assertEquals(
            expected: 'A representation of a cat',
            actual: $Swagger->definitions['Cat']->description
        );

        // Test Cat allOf structure
        self::assertIsArray($Swagger->definitions['Cat']->allOf);
        self::assertCount(2, $Swagger->definitions['Cat']->allOf);

        // Test Cat reference to Pet
        self::assertEquals(
            expected: '#/definitions/Pet',
            actual: $Swagger->definitions['Cat']->allOf[0]->ref
        );

        // Test Cat specific properties
        self::assertEquals(
            expected: 'object',
            actual: $Swagger->definitions['Cat']->allOf[1]->type
        );

        // Test huntingSkill property
        $huntingSkill = $Swagger->definitions['Cat']->allOf[1]->properties['huntingSkill'];
        self::assertEquals(expected: 'string', actual: $huntingSkill->type);
        self::assertEquals(
            expected: 'The measured skill for hunting',
            actual: $huntingSkill->description
        );
        self::assertEquals(expected: 'lazy', actual: $huntingSkill->default);
        self::assertEquals(
            expected: ['clueless', 'lazy', 'adventurous', 'aggressive'],
            actual: $huntingSkill->enum
        );

        // Test Cat required fields
        self::assertIsArray($Swagger->definitions['Cat']->allOf[1]->required);
        self::assertEquals(
            expected: ['huntingSkill'],
            actual: $Swagger->definitions['Cat']->allOf[1]->required
        );

        // Test Dog model
        self::assertArrayHasKey('Dog', $Swagger->definitions);
        self::assertEquals(
            expected: 'A representation of a dog',
            actual: $Swagger->definitions['Dog']->description
        );

        // Test Dog allOf structure
        self::assertIsArray($Swagger->definitions['Dog']->allOf);
        self::assertCount(2, $Swagger->definitions['Dog']->allOf);

        // Test Dog reference to Pet
        self::assertEquals(
            expected: '#/definitions/Pet',
            actual: $Swagger->definitions['Dog']->allOf[0]->ref
        );

        // Test Dog specific properties
        self::assertEquals(
            expected: 'object',
            actual: $Swagger->definitions['Dog']->allOf[1]->type
        );

        // Test packSize property
        $packSize = $Swagger->definitions['Dog']->allOf[1]->properties['packSize'];
        self::assertEquals(expected: 'integer', actual: $packSize->type);
        self::assertEquals(expected: 'int32', actual: $packSize->format);
        self::assertEquals(
            expected: 'the size of the pack the dog is from',
            actual: $packSize->description
        );
        self::assertEquals(expected: 0, actual: $packSize->default);
        self::assertEquals(expected: 0, actual: $packSize->minimum);

        // Test Dog required fields
        self::assertIsArray($Swagger->definitions['Dog']->allOf[1]->required);
        self::assertEquals(
            expected: ['packSize'],
            actual: $Swagger->definitions['Dog']->allOf[1]->required
        );
    }
}