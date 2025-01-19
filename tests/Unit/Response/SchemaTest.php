<?php

namespace Tests\Unit\Response;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelSwagger\Response;
use Zerotoprod\DataModelSwagger\Schema;

class SchemaTest extends TestCase
{

    #[Test] public function default_value(): void
    {
        $Response = Response::from();

        self::assertNull(
            actual: $Response->schema,
            message: 'A definition of the response structure. It can be a primitive, an array or an object. If this field does not exist, it means no content is returned as part of the response. As an extension to the Schema Object, its root type value may also be "file". This SHOULD be accompanied by a relevant produces mime-type.'
        );
    }

    #[Test] public function schema(): void
    {
        $Response = Response::from([
            Response::schema => [
                Schema::default => Schema::default
            ]
        ]);

        self::assertInstanceOf(
            expected: Schema::class,
            actual: $Response->schema,
            message: 'A definition of the response structure. It can be a primitive, an array or an object. If this field does not exist, it means no content is returned as part of the response. As an extension to the Schema Object, its root type value may also be "file". This SHOULD be accompanied by a relevant produces mime-type.'
        );

        self::assertEquals(
            expected: Schema::default,
            actual: $Response->schema->default,
            message: 'A definition of the response structure. It can be a primitive, an array or an object. If this field does not exist, it means no content is returned as part of the response. As an extension to the Schema Object, its root type value may also be "file". This SHOULD be accompanied by a relevant produces mime-type.'
        );
    }
}