<?php

namespace Tests\Unit\Schema;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelSwagger\Reference;
use Zerotoprod\DataModelSwagger\Schema;

class AdditionalPropertiesTest extends TestCase
{

    #[Test] public function default_value(): void
    {
        $Schema = Schema::from();

        self::assertFalse(
            condition: $Schema->additionalProperties,
            message: 'Value can be boolean or object. Inline or referenced schema MUST be of a Schema Object and not a standard JSON Schema. Consistent with JSON Schema, additionalProperties defaults to true'
        );
    }

    #[Test] public function false(): void
    {
        $Schema = Schema::from([
            Schema::additionalProperties => false
        ]);

        self::assertFalse(
            condition: $Schema->additionalProperties,
            message: 'Value can be boolean or object. Inline or referenced schema MUST be of a Schema Object and not a standard JSON Schema. Consistent with JSON Schema, additionalProperties defaults to true'
        );
    }

    #[Test] public function true(): void
    {
        $Schema = Schema::from([
            Schema::additionalProperties => true
        ]);

        self::assertTrue(
            condition: $Schema->additionalProperties,
            message: 'Value can be boolean or object. Inline or referenced schema MUST be of a Schema Object and not a standard JSON Schema. Consistent with JSON Schema, additionalProperties defaults to true'
        );
    }

    #[Test] public function reference(): void
    {
        $Schema = Schema::from([
            Schema::additionalProperties => [
                Schema::description => Schema::description
            ]
        ]);

        self::assertInstanceOf(
            expected: Schema::class,
            actual: $Schema->additionalProperties,
            message: 'Value can be boolean or object. Inline or referenced schema MUST be of a Schema Object and not a standard JSON Schema. Consistent with JSON Schema, additionalProperties defaults to true'
        );

        self::assertEquals(
            expected: Schema::description,
            actual: $Schema->additionalProperties->description,
            message: 'Value can be boolean or object. Inline or referenced schema MUST be of a Schema Object and not a standard JSON Schema. Consistent with JSON Schema, additionalProperties defaults to true'
        );
    }

    #[Test] public function schema(): void
    {
        $Schema = Schema::from([
            Schema::additionalProperties => [
                Schema::example => 'example'
            ]
        ]);

        self::assertInstanceOf(
            expected: Schema::class,
            actual: $Schema->additionalProperties,
            message: 'Value can be boolean or object. Inline or referenced schema MUST be of a Schema Object and not a standard JSON Schema. Consistent with JSON Schema, additionalProperties defaults to true'
        );

        self::assertEquals(
            expected: 'example',
            actual: $Schema->additionalProperties->example,
            message: 'Value can be boolean or object. Inline or referenced schema MUST be of a Schema Object and not a standard JSON Schema. Consistent with JSON Schema, additionalProperties defaults to true'
        );
    }

}