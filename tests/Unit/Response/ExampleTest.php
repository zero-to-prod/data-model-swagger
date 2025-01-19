<?php

namespace Tests\Unit\Response;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelSwagger\Response;

class ExampleTest extends TestCase
{

    #[Test] public function default_value(): void
    {
        $Response = Response::from();

        self::assertEmpty(
            actual: $Response->examples,
            message: 'An example of the response message.'
        );
    }

    #[Test] public function headers(): void
    {
        $Response = Response::from([
            Response::examples => [
                'application/json' => ['name' => 'Puma']
            ]
        ]);

        self::assertEquals(
            expected: ['name' => 'Puma'],
            actual: $Response->examples['application/json'],
            message: 'An example of the response message.'
        );
    }

}