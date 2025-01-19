<?php

namespace Tests\Unit\ExternalDocumentation;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelSwagger\ExternalDocumentation;

class DescriptionTest extends TestCase
{

    #[Test] public function missing_description(): void
    {
        $ExternalDocumentation = ExternalDocumentation::from([
            ExternalDocumentation::url => 'https://example.com/',
        ]);

        self::assertNull(
            $ExternalDocumentation->description,
            'A description of the target documentation. [CommonMark] syntax _MAY_ be used for rich text representation.'
        );
    }

    #[Test] public function description(): void
    {
        $ExternalDocumentation = ExternalDocumentation::from([
            ExternalDocumentation::url => 'https://example.com/',
            ExternalDocumentation::description => 'description',
        ]);

        self::assertEquals(
            expected: 'description',
            actual: $ExternalDocumentation->description,
            message: 'A description of the target documentation. [CommonMark] syntax _MAY_ be used for rich text representation.'
        );
    }
}