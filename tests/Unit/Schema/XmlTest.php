<?php

namespace Tests\Unit\Schema;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelSwagger\Schema;
use Zerotoprod\DataModelSwagger\Xml;

class XmlTest extends TestCase
{

    #[Test] public function discriminator_null(): void
    {
        $Schema = Schema::from();

        self::assertNull(
            actual: $Schema->xml,
            message: 'This _MAY_ be used only on property schemas. It has no effect on root schemas. Adds additional metadata to describe the XML representation of this property.'
        );
    }

    #[Test] public function discriminator(): void
    {
        $Schema = Schema::from([
            Schema::xml => [
                Xml::attribute => 'attribute',
            ],
        ]);

        self::assertEquals(
            expected: 'attribute',
            actual: $Schema->xml->attribute,
            message: 'This _MAY_ be used only on property schemas. It has no effect on root schemas. Adds additional metadata to describe the XML representation of this property.'
        );
    }
}