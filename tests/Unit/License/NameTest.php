<?php

namespace Tests\Unit\License;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModel\PropertyRequiredException;
use Zerotoprod\DataModelSwagger\License;

class NameTest extends TestCase
{
    #[Test] public function missing_name(): void
    {
        $this->expectException(PropertyRequiredException::class);
        License::from();
    }

    #[Test] public function name_field(): void
    {
        $License = License::from([
            License::name => 'name'
        ]);

        self::assertEquals(
            expected: 'name',
            actual: $License->name,
            message: 'The license name used for the API.'
        );
    }
}