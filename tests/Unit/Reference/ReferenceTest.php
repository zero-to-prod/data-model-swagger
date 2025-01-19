<?php

namespace Tests\Unit\Reference;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelSwagger\Reference;

class ReferenceTest extends TestCase
{
    #[Test] public function missing_ref(): void
    {
        $json = '{"$ref": "#/components/schemas/Pet"}';

        $Reference = Reference::from(json_decode($json, true));

        self::assertEquals(
            expected: '#/components/schemas/Pet',
            actual: $Reference->ref,
        );
    }
}