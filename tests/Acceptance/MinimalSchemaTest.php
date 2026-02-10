<?php

namespace Tests\Acceptance;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelSwagger\Info;
use Zerotoprod\DataModelSwagger\Schema;
use Zerotoprod\DataModelSwagger\Swagger;

class MinimalSchemaTest extends TestCase
{
    #[Test] public function minimal_schema_with_only_required_fields(): void
    {
        $Swagger = Swagger::from([
            Swagger::swagger => '2.0',
            Swagger::info => [Info::title => 'Test', Info::version => '1.0'],
            Swagger::paths => [],
        ]);

        self::assertEmpty($Swagger->definitions);
        self::assertEmpty($Swagger->parameters);
        self::assertEmpty($Swagger->responses);
        self::assertEmpty($Swagger->securityDefinitions);
    }

    #[Test] public function minimal_schema_with_definitions_only(): void
    {
        $Swagger = Swagger::from([
            Swagger::swagger => '2.0',
            Swagger::info => [Info::title => 'Test', Info::version => '1.0'],
            Swagger::paths => [],
            Swagger::definitions => [
                'User' => [
                    Schema::type => 'object',
                    Schema::properties => [
                        'name' => [Schema::type => 'string'],
                    ],
                ],
            ],
        ]);

        self::assertInstanceOf(Schema::class, $Swagger->definitions['User']);
        self::assertEquals(
            expected: 'object',
            actual: $Swagger->definitions['User']->type
        );
        self::assertEmpty($Swagger->parameters);
        self::assertEmpty($Swagger->responses);
        self::assertEmpty($Swagger->securityDefinitions);
    }

    #[Test] public function minimal_schema_from_json(): void
    {
        $json = <<<JSON
        {
            "swagger": "2.0",
            "info": { "title": "Test", "version": "1.0" },
            "paths": {},
            "definitions": {
                "User": {
                    "type": "object",
                    "properties": {
                        "name": { "type": "string" }
                    }
                }
            }
        }
        JSON;

        $Swagger = Swagger::from(json_decode($json, true));

        self::assertEquals(expected: '2.0', actual: $Swagger->swagger);
        self::assertEquals(expected: 'Test', actual: $Swagger->info->title);
        self::assertInstanceOf(Schema::class, $Swagger->definitions['User']);
        self::assertEmpty($Swagger->parameters);
        self::assertEmpty($Swagger->responses);
        self::assertEmpty($Swagger->securityDefinitions);
    }
}