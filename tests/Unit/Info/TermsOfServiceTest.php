<?php

namespace Tests\Unit\Info;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModel\PropertyRequiredException;
use Zerotoprod\DataModelSwagger\Info;

class TermsOfServiceTest extends TestCase
{

    #[Test] public function termsOfService(): void
    {
        $Info = Info::from([
            Info::title => 'title',
            Info::termsOfService => 'https://example.com/',
            Info::version => 'version',
        ]);

        self::assertEquals(
            expected: 'https://example.com/',
            actual: $Info->termsOfService,
            message: 'A URL for the Terms of Service for the API. This _MUST_ be in the form of a URL.'
        );
    }

    #[Test] public function missing_version(): void
    {
        $this->expectException(PropertyRequiredException::class);
        $this->expectExceptionMessage('Property `$version` is required.');

        Info::from([
            Info::title => 'title',
        ]);
    }
}