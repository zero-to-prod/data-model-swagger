<?php

namespace Tests\Unit\Tag;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelSwagger\ExternalDocumentation;
use Zerotoprod\DataModelSwagger\Tag;

class ExternalDocsTest extends TestCase
{

    #[Test] public function externalDocs_null(): void
    {
        $Tag = Tag::from([
            Tag::name => 'name',
        ]);

        self::assertNull(
            actual: $Tag->externalDocs,
            message: 'Additional external documentation for this tag.'
        );
    }

    #[Test] public function externalDocs(): void
    {
        $Tag = Tag::from([
            Tag::name => 'name',
            Tag::externalDocs => [
                ExternalDocumentation::url => 'https://example.com',
            ],
        ]);

        self::assertEquals(
            expected: 'https://example.com',
            actual: $Tag->externalDocs->url,
            message: 'Additional external documentation for this tag.'
        );
    }
}