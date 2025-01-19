<?php

namespace Tests\Unit\Schema;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelSwagger\Reference;
use Zerotoprod\DataModelSwagger\Schema;

class AllOfTest extends TestCase
{

    #[Test] public function default_value(): void
    {
        $Schema = Schema::from();

        self::assertEmpty(
            actual: $Schema->allOf,
            message: 'Inline or referenced schema MUST be of a Schema Object and not a standard JSON Schema.'
        );
    }

    #[Test] public function reference(): void
    {
        $Schema = Schema::from([
            Schema::allOf => [
                [Schema::description => Schema::description]
            ]
        ]);

        self::assertInstanceOf(
            expected: Schema::class,
            actual: $Schema->allOf[0],
            message: 'Inline or referenced schema MUST be of a Schema Object and not a standard JSON Schema.'
        );

        self::assertEquals(
            expected: Schema::description,
            actual: $Schema->allOf[0]->description,
            message: 'Inline or referenced schema MUST be of a Schema Object and not a standard JSON Schema.'
        );
    }

    #[Test] public function schema(): void
    {
        $Schema = Schema::from([
            Schema::allOf => [
                [Schema::example => 'example']
            ]
        ]);

        self::assertInstanceOf(
            expected: Schema::class,
            actual: $Schema->allOf[0],
            message: 'Inline or referenced schema MUST be of a Schema Object and not a standard JSON Schema.'
        );

        self::assertEquals(
            expected: 'example',
            actual: $Schema->allOf[0]->example,
            message: 'Inline or referenced schema MUST be of a Schema Object and not a standard JSON Schema.'
        );
    }

}