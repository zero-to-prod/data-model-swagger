<?php

namespace Tests\Unit\ExternalDocumentation;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelSwagger\ExternalDocumentation;

class UrlTest extends TestCase
{
    #[Test] public function url(): void
    {
        $ExternalDocumentation = ExternalDocumentation::from([
            ExternalDocumentation::url => 'https://example.com/',
        ]);

        self::assertEquals(
            expected: 'https://example.com/',
            actual: $ExternalDocumentation->url,
            message: 'REQUIRED. The URL for the target documentation. This _MUST_ be in the form of a URL.'
        );
    }
}