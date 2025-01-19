<?php

namespace Tests\Acceptance;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelSwagger\Operation;
use Zerotoprod\DataModelSwagger\Swagger;

class OperationTest extends TestCase
{
    #[Test] public function test(): void
    {
        $json = <<<JSON
        {
          "tags": [
            "pet"
          ],
          "summary": "Updates a pet in the store with form data",
          "description": "",
          "operationId": "updatePetWithForm",
          "consumes": [
            "application/x-www-form-urlencoded"
          ],
          "produces": [
            "application/json",
            "application/xml"
          ],
          "parameters": [
            {
              "name": "petId",
              "in": "path",
              "description": "ID of pet that needs to be updated",
              "required": true,
              "type": "string"
            },
            {
              "name": "name",
              "in": "formData",
              "description": "Updated name of the pet",
              "required": false,
              "type": "string"
            },
            {
              "name": "status",
              "in": "formData",
              "description": "Updated status of the pet",
              "required": false,
              "type": "string"
            }
          ],
          "responses": {
            "200": {
              "description": "Pet updated."
            },
            "405": {
              "description": "Invalid input"
            }
          },
          "security": [
            {
              "petstore_auth": [
                "write:pets",
                "read:pets"
              ]
            }
          ]
        }
        JSON;

        $Operation = Operation::from(json_decode($json, true));

        self::assertEquals(
            expected: 'pet',
            actual: $Operation->tags[0],
        );
        self::assertEquals(
            expected: 'Updates a pet in the store with form data',
            actual: $Operation->summary,
        );
        self::assertEquals(
            expected: '',
            actual: $Operation->description,
        );
        self::assertEquals(
            expected: 'updatePetWithForm',
            actual: $Operation->operationId,
        );
        self::assertEquals(
            expected: 'application/x-www-form-urlencoded',
            actual: $Operation->consumes[0],
        );
        self::assertEquals(
            expected: 'application/json',
            actual: $Operation->produces[0],
        );
        self::assertEquals(
            expected: 'application/xml',
            actual: $Operation->produces[1],
        );
        self::assertEquals(
            expected: 'petId',
            actual: $Operation->parameters[0]->name,
        );
        self::assertEquals(
            expected: 'path',
            actual: $Operation->parameters[0]->in,
        );
        self::assertEquals(
            expected: 'ID of pet that needs to be updated',
            actual: $Operation->parameters[0]->description,
        );
        self::assertTrue(
            condition: $Operation->parameters[0]->required,
        );
        self::assertEquals(
            expected: 'string',
            actual: $Operation->parameters[0]->type,
        );
        self::assertEquals(
            expected: 'name',
            actual: $Operation->parameters[1]->name,
        );
        self::assertEquals(
            expected: 'formData',
            actual: $Operation->parameters[1]->in,
        );
        self::assertEquals(
            expected: 'Updated name of the pet',
            actual: $Operation->parameters[1]->description,
        );
        self::assertFalse(
            condition: $Operation->parameters[1]->required,
        );
        self::assertEquals(
            expected: 'string',
            actual: $Operation->parameters[1]->type,
        );
        self::assertEquals(
            expected: 'status',
            actual: $Operation->parameters[2]->name,
        );
        self::assertEquals(
            expected: 'formData',
            actual: $Operation->parameters[2]->in,
        );
        self::assertEquals(
            expected: 'Updated status of the pet',
            actual: $Operation->parameters[2]->description,
        );
        self::assertFalse(
            condition: $Operation->parameters[2]->required,
        );
        self::assertEquals(
            expected: 'string',
            actual: $Operation->parameters[2]->type,
        );
        self::assertEquals(
            expected: 'Pet updated.',
            actual: $Operation->responses['200']->description,
        );
        self::assertEquals(
            expected: 'Invalid input',
            actual: $Operation->responses['405']->description,
        );
        self::assertEquals(
            expected: 'write:pets',
            actual: $Operation->security[0]['petstore_auth'][0],
        );
        self::assertEquals(
            expected: 'read:pets',
            actual: $Operation->security[0]['petstore_auth'][1],
        );
    }
}