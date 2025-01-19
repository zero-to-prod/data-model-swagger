<?php

namespace Tests\Unit\Tag;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelSwagger\Tag;

class DescriptionTest extends TestCase
{
    #[Test] public function nullable(): void
    {
        $Tag = Tag::from([
            Tag::name => 'name',
        ]);

        self::assertNull(
            actual: $Tag->description,
            message: 'A description for the tag. [CommonMark] syntax MAY be used for rich text representation.'
        );
    }

    #[Test] public function string(): void
    {
        $Tag = Tag::from([
            Tag::name => 'name',
            Tag::description => 'description',
        ]);

        self::assertEquals(
            expected: 'description',
            actual: $Tag->description,
            message: 'A description for the tag. [CommonMark] syntax MAY be used for rich text representation.'
        );
    }
}