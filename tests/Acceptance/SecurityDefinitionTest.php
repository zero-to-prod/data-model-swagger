<?php

namespace Tests\Acceptance;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelSwagger\Swagger;

class SecurityDefinitionTest extends TestCase
{
    #[Test]
    public function test(): void
    {
        $json = <<<JSON
        {
          "swagger": "3.0.3",
          "info": {
            "title": "title",
            "version": "version"
          },
          "paths": [],
          "securityDefinitions": {
            "api_key": {
                "type": "apiKey",
                "name": "api_key",
                "in": "header"
              },
              "petstore_auth": {
                "type": "oauth2",
                "authorizationUrl": "http://swagger.io/api/oauth/dialog",
                "flow": "implicit",
                "scopes": {
                  "write:pets": "modify pets in your account",
                  "read:pets": "read your pets"
                }
              }
          }
        }
        JSON;

        $Swagger = Swagger::from(json_decode($json, true));

        // Test api_key security definition
        self::assertEquals(
            expected: 'apiKey',
            actual: $Swagger->securityDefinitions['api_key']->type,
        );
        self::assertEquals(
            expected: 'api_key',
            actual: $Swagger->securityDefinitions['api_key']->name
        );
        self::assertEquals(
            expected: 'header',
            actual: $Swagger->securityDefinitions['api_key']->in
        );

        // Test petstore_auth security definition
        self::assertEquals(
            expected: 'oauth2',
            actual: $Swagger->securityDefinitions['petstore_auth']->type
        );
        self::assertEquals(
            expected: 'http://swagger.io/api/oauth/dialog',
            actual: $Swagger->securityDefinitions['petstore_auth']->authorizationUrl
        );
        self::assertEquals(
            expected: 'implicit',
            actual: $Swagger->securityDefinitions['petstore_auth']->flow
        );

        // Test scopes
        self::assertIsArray($Swagger->securityDefinitions['petstore_auth']->scopes);
        self::assertCount(2, $Swagger->securityDefinitions['petstore_auth']->scopes);
        self::assertEquals(
            expected: 'modify pets in your account',
            actual: $Swagger->securityDefinitions['petstore_auth']->scopes['write:pets']
        );
        self::assertEquals(
            expected: 'read your pets',
            actual: $Swagger->securityDefinitions['petstore_auth']->scopes['read:pets']
        );

        // Test securityDefinitions structure
        self::assertIsArray($Swagger->securityDefinitions);
        self::assertCount(2, $Swagger->securityDefinitions);
        self::assertArrayHasKey('api_key', $Swagger->securityDefinitions);
        self::assertArrayHasKey('petstore_auth', $Swagger->securityDefinitions);

        // Test swagger version and info
        self::assertEquals('3.0.3', $Swagger->swagger);
        self::assertEquals('title', $Swagger->info->title);
        self::assertEquals('version', $Swagger->info->version);
    }
}