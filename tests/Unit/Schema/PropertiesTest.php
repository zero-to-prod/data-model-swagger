<?php

namespace Tests\Unit\Schema;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelSwagger\Reference;
use Zerotoprod\DataModelSwagger\Schema;

class PropertiesTest extends TestCase
{

    #[Test] public function default_value(): void
    {
        $Schema = Schema::from();

        self::assertEmpty(
            actual: $Schema->properties,
            message: 'Property definitions MUST be a Schema Object and not a standard JSON Schema (inline or referenced).'
        );
    }

    #[Test] public function reference(): void
    {
        $Schema = Schema::from([
            Schema::properties => [
                'property1' => [
                    Schema::description => Schema::description
                ]
            ]
        ]);

        self::assertInstanceOf(
            expected: Schema::class,
            actual: $Schema->properties['property1'],
            message: 'Property definitions MUST be a Schema Object and not a standard JSON Schema (inline or referenced).'
        );

        self::assertEquals(
            expected: Schema::description,
            actual: $Schema->properties['property1']->description,
            message: 'Property definitions MUST be a Schema Object and not a standard JSON Schema (inline or referenced).'
        );
    }

    #[Test] public function schema(): void
    {
        $Schema = Schema::from([
            Schema::properties => [
                'property1' => [
                    Schema::example => 'example'
                ]
            ]
        ]);

        self::assertInstanceOf(
            expected: Schema::class,
            actual: $Schema->properties['property1'],
            message: 'Property definitions MUST be a Schema Object and not a standard JSON Schema (inline or referenced).'
        );

        self::assertEquals(
            expected: 'example',
            actual: $Schema->properties['property1']->example,
            message: 'Property definitions MUST be a Schema Object and not a standard JSON Schema (inline or referenced).'
        );
    }

}