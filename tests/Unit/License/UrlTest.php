<?php

namespace Tests\Unit\License;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelSwagger\License;

class UrlTest extends TestCase
{
    #[Test] public function missing_url(): void
    {
        $License = License::from([
            License::name => 'name'
        ]);

        self::assertNull(
            actual: $License->url,
            message: 'A URL for the license used for the API. This _MUST_ be in the form of a URL.'
        );
    }

    #[Test] public function url(): void
    {
        $License = License::from([
            License::name => 'name',
            License::url => 'https://example.com/'
        ]);

        self::assertEquals(
            expected: 'https://example.com/',
            actual: $License->url,
            message: 'A URL for the license used for the API. This _MUST_ be in the form of a URL.'
        );
    }
}