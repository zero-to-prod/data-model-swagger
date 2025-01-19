<?php

namespace Tests\Unit\Response;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelSwagger\Header;
use Zerotoprod\DataModelSwagger\Response;

class HeadersTest extends TestCase
{

    #[Test] public function default_value(): void
    {
        $Response = Response::from();

        self::assertEquals(
            expected: [],
            actual: $Response->headers,
            message: 'Maps a header name to its definition.'
        );
    }

    #[Test] public function headers(): void
    {
        $Response = Response::from([
            Response::headers => [
                'X-Rate-Limit-Limit' => [Header::type => Header::type]
            ]
        ]);

        self::assertInstanceOf(
            expected: Header::class,
            actual: $Response->headers['X-Rate-Limit-Limit'],
            message: 'Maps a header name to its definition.'
        );

        self::assertEquals(
            expected: Header::type,
            actual: $Response->headers['X-Rate-Limit-Limit']->type,
            message: 'Maps a header name to its definition.'
        );
    }

}