<?php

namespace Tests\Unit\Tag;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModel\PropertyRequiredException;
use Zerotoprod\DataModelSwagger\Tag;

class NameTest extends TestCase
{

    #[Test] public function default_value(): void
    {
        $this->expectException(PropertyRequiredException::class);
        $this->expectExceptionMessage('Property `$name` is required.');

        Tag::from();
    }

    #[Test] public function name_property(): void
    {
        $Tag = Tag::from([
            Tag::name => 'name',
        ]);

        $this->assertEquals(
            expected: 'name',
            actual: $Tag->name,
            message: 'REQUIRED. The name of the tag.'
        );
    }
}