<?php

namespace Zerotoprod\DataModelSwagger;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\DataModelSwagger\Helpers\DataModel;

/**
 * Allows the definition of a security scheme that can be used by the operations.
 * Supported schemes are basic authentication, an API key (either as a header or
 * as a query parameter) and OAuth2's common flows (implicit, password,
 * application and access code).
 *
 * @see  https://swagger.io/specification/v2
 * @link https://github.com/zero-to-prod/data-model-swagger
 */
class SecurityScheme
{
    use DataModel;

    /**
     * Required. The type of the security scheme. Valid
     * values are "basic", "apiKey" or "oauth2".
     *
     * @see  https://swagger.io/specification/v2/
     * @see  $type
     * @link https://github.com/zero-to-prod/data-model-swagger
     */
    public const type = 'type';

    /**
     * Required. The type of the security scheme. Valid
     * values are "basic", "apiKey" or "oauth2".
     *
     * @see  https://swagger.io/specification/v2
     * @link https://github.com/zero-to-prod/data-model-swagger
     */
    #[Describe(['nullable'])]
    public ?string $type;

    /**
     * A short description for security scheme.
     *
     * @see  https://swagger.io/specification/v2/
     * @see  $description
     * @link https://github.com/zero-to-prod/data-model-swagger
     */
    public const description = 'description';

    /**
     * A short description for security scheme.
     *
     * @see  https://swagger.io/specification/v2
     * @link https://github.com/zero-to-prod/data-model-swagger
     */
    #[Describe(['nullable'])]
    public ?string $description;

    /**
     * Required. The name of the header or query parameter to be used.
     *
     * @see  https://swagger.io/specification/v2/
     * @see  $name
     * @link https://github.com/zero-to-prod/data-model-swagger
     */
    public const name = 'name';

    /**
     * Required. The name of the header or query parameter to be used.
     *
     * @see  https://swagger.io/specification/v2
     * @link https://github.com/zero-to-prod/data-model-swagger
     */
    #[Describe(['nullable'])]
    public ?string $name;

    /**
     * Required The location of the API key. Valid values are "query" or "header".
     *
     * @see  https://swagger.io/specification/v2/
     * @see  $in
     * @link https://github.com/zero-to-prod/data-model-swagger
     */
    public const in = 'in';

    /**
     * Required The location of the API key. Valid values are "query" or "header".
     *
     * @see  https://swagger.io/specification/v2
     * @link https://github.com/zero-to-prod/data-model-swagger
     */
    #[Describe(['nullable'])]
    public ?string $in;

    /**
     * **REQUIRED**. An object containing configuration information for the
     * flow types supported.
     *
     * @see  https://swagger.io/specification/v2/
     * @see  $flow
     * @link https://github.com/zero-to-prod/data-model-swagger
     */
    public const flow = 'flow';

    /**
     * **REQUIRED**. An object containing configuration information for the
     * flow types supported.
     *
     * @see  https://swagger.io/specification/v2
     * @link https://github.com/zero-to-prod/data-model-swagger
     */
    #[Describe(['nullable'])]
    public null|string $flow;

    /**
     * Required. The authorization URL to be used for this flow.
     * This SHOULD be in the form of a URL.
     *
     * @see  https://swagger.io/specification/v2/
     * @see  $authorizationUrl
     * @link https://github.com/zero-to-prod/data-model-swagger
     */
    public const authorizationUrl = 'authorizationUrl';

    /**
     * Required. The authorization URL to be used for this flow.
     * This SHOULD be in the form of a URL.
     *
     * @see  https://swagger.io/specification/v2
     * @link https://github.com/zero-to-prod/data-model-swagger
     */
    #[Describe(['nullable'])]
    public ?string $authorizationUrl;

    /**
     * Required. The token URL to be used for this flow.
     * This SHOULD be in the form of a URL.
     *
     * @see  https://swagger.io/specification/v2/
     * @see  $tokenUrl
     * @link https://github.com/zero-to-prod/data-model-swagger
     */
    public const tokenUrl = 'tokenUrl';

    /**
     * Required. The token URL to be used for this flow.
     * This SHOULD be in the form of a URL.
     *
     * @see  https://swagger.io/specification/v2
     * @link https://github.com/zero-to-prod/data-model-swagger
     */
    #[Describe(['nullable'])]
    public ?string $tokenUrl;

    /**
     * Required. The token URL to be used for this flow.
     * This SHOULD be in the form of a URL.
     *
     * @see  https://swagger.io/specification/v2/
     * @see  $scopes
     * @link https://github.com/zero-to-prod/data-model-swagger
     */
    public const scopes = 'scopes';

    /**
     * Required. The token URL to be used for this flow.
     * This SHOULD be in the form of a URL.
     *
     * @see  https://swagger.io/specification/v2
     * @link https://github.com/zero-to-prod/data-model-swagger
     */
    #[Describe(['default' => []])]
    public array $scopes;
}
