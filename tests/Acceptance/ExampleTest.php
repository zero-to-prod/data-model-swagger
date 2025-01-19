<?php

namespace Tests\Acceptance;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelSwagger\Response;

class ExampleTest extends TestCase
{
    #[Test] public function test(): void
    {
        $json = <<<JSON
        {
            "examples": {
              "application/json": {
                    "name": "Puma",
                    "type": "Dog",
                    "color": "Black",
                    "gender": "Female",
                    "breed": "Mixed"
                  }
            }
        }
        JSON;

        $Response = Response::from(json_decode($json, true));

        self::assertArrayHasKey('application/json', $Response->examples);
        self::assertIsArray($Response->examples['application/json']);
        self::assertEquals(
            expected: 'Puma',
            actual: $Response->examples['application/json']['name'],
        );
        self::assertEquals(
            expected: 'Dog',
            actual: $Response->examples['application/json']['type'],
        );
        self::assertEquals(
            expected: 'Black',
            actual: $Response->examples['application/json']['color'],
        );
        self::assertEquals(
            expected: 'Female',
            actual: $Response->examples['application/json']['gender'],
        );
        self::assertEquals(
            expected: 'Mixed',
            actual: $Response->examples['application/json']['breed'],
        );
        self::assertEquals(
            expected: [
                'name' => 'Puma',
                'type' => 'Dog',
                'color' => 'Black',
                'gender' => 'Female',
                'breed' => 'Mixed'
            ],
            actual: $Response->examples['application/json'],
        );
        self::assertCount(5, $Response->examples['application/json']);
    }
}