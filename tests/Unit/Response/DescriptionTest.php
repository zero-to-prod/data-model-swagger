<?php

namespace Tests\Unit\Response;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelSwagger\Response;

class DescriptionTest extends TestCase
{
    #[Test] public function nullable(): void
    {
        $Response = Response::from();

        self::assertNull(
            actual: $Response->description,
            message: 'REQUIRED. A description of the response. [CommonMark] syntax MAY be used for rich text representation.'
        );
    }

    #[Test] public function string(): void
    {
        $Response = Response::from([
            Response::description => 'description',
        ]);

        self::assertEquals(
            expected: 'description',
            actual: $Response->description,
            message: 'REQUIRED. A description of the response. [CommonMark] syntax MAY be used for rich text representation.'
        );
    }
}