<?php

namespace Tests\Unit\Parameter;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelSwagger\Item;
use Zerotoprod\DataModelSwagger\Parameter;

class UniqueItemsTest extends TestCase
{
    #[Test] public function nullable(): void
    {
        $Parameter = Parameter::from([
            Parameter::name => Parameter::name,
            Parameter::in => Parameter::in,
            Parameter::type => Parameter::type,
        ]);

        self::assertFalse(
            condition: $Parameter->uniqueItems,
        );
    }

    #[Test] public function false(): void
    {
        $Parameter = Parameter::from([
            Parameter::name => Parameter::name,
            Parameter::in => Parameter::in,
            Parameter::type => Parameter::type,
            Parameter::uniqueItems => false,
        ]);

        self::assertFalse(
            condition: $Parameter->uniqueItems,
        );
    }

    #[Test] public function true(): void
    {
        $Parameter = Parameter::from([
            Parameter::name => Parameter::name,
            Parameter::in => Parameter::in,
            Parameter::type => Parameter::type,
            Parameter::uniqueItems => true,
        ]);

        self::assertTrue(
            condition: $Parameter->uniqueItems,
        );
    }
}