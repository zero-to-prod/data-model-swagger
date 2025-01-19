<?php

namespace Tests\Acceptance;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelSwagger\Item;

class ItemTest extends TestCase
{
    #[Test] public function test(): void
    {
        $json = <<<JSON
        {
            "type": "string",
            "minLength": 2
        }
        JSON;

        $Item = Item::from(json_decode($json, true));

        self::assertEquals(
            expected: 'string',
            actual: $Item->type,
        );
        self::assertEquals(
            expected: 2,
            actual: $Item->minLength,
        );
    }

    #[Test] public function array_of_arrays(): void
    {
        $json = <<<JSON
        {
            "type": "array",
            "items": {
                "type": "integer",
                "minimum": 0,
                "maximum": 63
            }
        }
        JSON;

        $Item = Item::from(json_decode($json, true));

        self::assertEquals(
            expected: 'array',
            actual: $Item->type,
        );
        self::assertEquals(
            expected: 'integer',
            actual: $Item->items->type,
        );
        self::assertEquals(
            expected: 0,
            actual: $Item->items->minimum,
        );
        self::assertEquals(
            expected: 63,
            actual: $Item->items->maximum,
        );
    }
}