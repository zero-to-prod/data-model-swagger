<?php

namespace Tests\Unit\Schema;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelSwagger\Reference;
use Zerotoprod\DataModelSwagger\Schema;

class ItemsTest extends TestCase
{

    #[Test] public function default_value(): void
    {
        $Schema = Schema::from();

        self::assertNull(
            actual: $Schema->items,
            message: 'Value MUST be an object and not an array. Inline or referenced schema MUST be of a Schema Object and not a standard JSON Schema. items MUST be present if type is "array".'
        );
    }

    #[Test] public function reference(): void
    {
        $Schema = Schema::from([
            Schema::items => [
                Schema::description => Schema::description
            ]
        ]);

        self::assertInstanceOf(
            expected: Schema::class,
            actual: $Schema->items,
            message: 'Value MUST be an object and not an array. Inline or referenced schema MUST be of a Schema Object and not a standard JSON Schema. items MUST be present if type is "array".'
        );

        self::assertEquals(
            expected: Schema::description,
            actual: $Schema->items->description,
            message: 'Value MUST be an object and not an array. Inline or referenced schema MUST be of a Schema Object and not a standard JSON Schema. items MUST be present if type is "array".'
        );
    }

    #[Test] public function schema(): void
    {
        $Schema = Schema::from([
            Schema::items => [
                Schema::example => 'example'
            ]
        ]);

        self::assertInstanceOf(
            expected: Schema::class,
            actual: $Schema->items,
            message: 'Value MUST be an object and not an array. Inline or referenced schema MUST be of a Schema Object and not a standard JSON Schema. items MUST be present if type is "array".'
        );

        self::assertEquals(
            expected: 'example',
            actual: $Schema->items->example,
            message: 'Value MUST be an object and not an array. Inline or referenced schema MUST be of a Schema Object and not a standard JSON Schema. items MUST be present if type is "array".'
        );
    }

}