<?php

namespace Tests\Unit\Info;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelSwagger\Info;

class DescriptionTest extends TestCase
{
    #[Test] public function missing_description(): void
    {
        $Info = Info::from([
            Info::title => 'title',
            Info::version => 'version',
        ]);

        self::assertNull(
            actual: $Info->description,
            message: 'A description of the API. [CommonMark] syntax _MAY_ be used for rich text representation.'
        );
    }

    #[Test] public function description(): void
    {
        $Info = Info::from([
            Info::title => 'title',
            Info::description => 'description',
            Info::version => 'version',
        ]);

        self::assertEquals(
            expected: 'description',
            actual: $Info->description,
            message: 'A description of the API. [CommonMark] syntax _MAY_ be used for rich text representation.'
        );
    }
}