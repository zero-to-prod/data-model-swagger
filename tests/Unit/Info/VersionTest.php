<?php

namespace Tests\Unit\Info;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModel\PropertyRequiredException;
use Zerotoprod\DataModelSwagger\Info;

class VersionTest extends TestCase
{

    #[Test] public function missing_version(): void
    {
        $this->expectException(PropertyRequiredException::class);
        $this->expectExceptionMessage('Property `$version` is required.');

        Info::from([
            Info::title => 'title',
        ]);
    }

    #[Test] public function version(): void
    {
        $Info = Info::from([
            Info::title => 'title',
            Info::version => '1.0.0',
        ]);

        self::assertEquals(
            expected: '1.0.0',
            actual: $Info->version,
        );
    }
}