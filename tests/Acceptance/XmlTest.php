<?php

namespace Tests\Acceptance;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelSwagger\Schema;

class XmlTest extends TestCase
{
    #[Test] public function test(): void
    {
        $json = <<<JSON
        {
            "type": "object",
            "properties": {
              "id": {
                "type": "integer",
                "format": "int32",
                "xml": {
                  "attribute": true
                }
              },
              "name": {
                "type": "string",
                "xml": {
                  "namespace": "http://swagger.io/schema/sample",
                  "prefix": "sample"
                }
              }
            }
        }
        JSON;

        $Schema = Schema::from(json_decode($json, true));

        // Test root schema type
        self::assertEquals(
            expected: 'object',
            actual: $Schema->type,
        );

        // Test properties existence
        self::assertIsArray($Schema->properties);
        self::assertCount(2, $Schema->properties);
        self::assertArrayHasKey('id', $Schema->properties);
        self::assertArrayHasKey('name', $Schema->properties);

        // Test id property
        $idProperty = $Schema->properties['id'];
        self::assertInstanceOf(Schema::class, $idProperty);
        self::assertEquals(
            expected: 'integer',
            actual: $idProperty->type
        );
        self::assertEquals(
            expected: 'int32',
            actual: $idProperty->format
        );

        // Test id XML attributes
        self::assertNotNull($idProperty->xml);
        self::assertTrue($idProperty->xml->attribute);

        // Test name property
        $nameProperty = $Schema->properties['name'];
        self::assertInstanceOf(Schema::class, $nameProperty);
        self::assertEquals(
            expected: 'string',
            actual: $nameProperty->type
        );

        // Test name XML attributes
        self::assertNotNull($nameProperty->xml);
        self::assertEquals(
            expected: 'http://swagger.io/schema/sample',
            actual: $nameProperty->xml->namespace
        );
        self::assertEquals(
            expected: 'sample',
            actual: $nameProperty->xml->prefix
        );
    }

    #[Test] public function changing_element_names(): void
    {
        $json = <<<JSON
        {
            "type": "array",
            "items": {
              "type": "string",
              "xml": {
                "name": "animal"
              }
            }
        }
        JSON;

        $Schema = Schema::from(json_decode($json, true));

        // Test root schema type
        self::assertEquals(
            expected: 'array',
            actual: $Schema->type,
        );

        // Test items property exists and is a Schema instance
        self::assertNotNull($Schema->items);
        self::assertInstanceOf(Schema::class, $Schema->items);

        // Test items type
        self::assertEquals(
            expected: 'string',
            actual: $Schema->items->type
        );

        // Test items XML property exists
        self::assertNotNull($Schema->items->xml);

        // Test XML name property
        self::assertEquals(
            expected: 'animal',
            actual: $Schema->items->xml->name
        );

        // Additional structural validations
        self::assertObjectHasProperty('items', $Schema);
        self::assertObjectHasProperty('xml', $Schema->items);
        self::assertObjectHasProperty('name', $Schema->items->xml);
    }

    #[Test] public function the_external_name_property_has_no_effect_on_the_XML(): void
    {
        $json = <<<JSON
        {
            "type": "array",
            "items": {
              "type": "string",
              "xml": {
                "name": "animal"
              }
            },
            "xml": {
              "name": "aliens"
            }
        }
        JSON;

        $Schema = Schema::from(json_decode($json, true));

        self::assertEquals(
            expected: 'array',
            actual: $Schema->type,
        );

        self::assertNotNull($Schema->items);
        self::assertInstanceOf(Schema::class, $Schema->items);

        self::assertEquals(
            expected: 'string',
            actual: $Schema->items->type
        );

        self::assertNotNull($Schema->items->xml);
        self::assertEquals(
            expected: 'animal',
            actual: $Schema->items->xml->name
        );

        self::assertNotNull($Schema->xml);
        self::assertEquals(
            expected: 'aliens',
            actual: $Schema->xml->name
        );

        self::assertObjectHasProperty('items', $Schema);
        self::assertObjectHasProperty('xml', $Schema->items);
        self::assertObjectHasProperty('xml', $Schema);
    }
}