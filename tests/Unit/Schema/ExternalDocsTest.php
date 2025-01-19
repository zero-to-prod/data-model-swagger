<?php

namespace Tests\Unit\Schema;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelSwagger\ExternalDocumentation;
use Zerotoprod\DataModelSwagger\Schema;

class ExternalDocsTest extends TestCase
{

    #[Test] public function discriminator_null(): void
    {
        $Schema = Schema::from();

        self::assertNull(
            actual: $Schema->externalDocs,
            message: 'Additional external documentation for this schema.'
        );
    }

    #[Test] public function discriminator(): void
    {
        $Schema = Schema::from([
            Schema::externalDocs => [
                ExternalDocumentation::url => 'https://example.com',
            ],
        ]);

        self::assertEquals(
            expected: 'https://example.com',
            actual: $Schema->externalDocs->url,
            message: 'Additional external documentation for this schema.'
        );
    }
}