<?php

namespace Zerotoprod\DataModelSwagger;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\DataModelSwagger\Helpers\DataModel;

/**
 * fka Swagger RESTful API Documentation Specification
 *
 * @see  https://swagger.io/specification/v2
 * @link https://github.com/zero-to-prod/data-model-swagger
 */
class Swagger
{
    use DataModel;

    /**
     * **REQUIRED**. Specifies the Swagger Specification version
     * being used. It can be used by the Swagger UI and other
     * clients to interpret the API listing. The value MUST
     * be "2.0".
     *
     * @see  https://swagger.io/specification/v2/
     * @see  $swagger
     * @link https://github.com/zero-to-prod/data-model-swagger
     */
    public const swagger = 'swagger';

    /**
     * **REQUIRED**. Specifies the Swagger Specification version
     * being used. It can be used by the Swagger UI and other
     * clients to interpret the API listing. The value MUST
     * be "2.0".
     *
     * @see  https://swagger.io/specification/v2
     * @link https://github.com/zero-to-prod/data-model-swagger
     */
    #[Describe(['required'])]
    public string $swagger;

    /**
     * **Required**. Provides metadata about the API. The
     * metadata can be used by the clients if needed.
     *
     * @see  https://swagger.io/specification/v2/
     * @see  $info
     * @link https://github.com/zero-to-prod/data-model-swagger
     */
    public const info = 'info';

    /**
     * **Required**. Provides metadata about the API. The
     * metadata can be used by the clients if needed.
     *
     * @see  https://swagger.io/specification/v2
     * @link https://github.com/zero-to-prod/data-model-swagger
     */
    #[Describe(['required'])]
    public Info $info;

    /**
     * The host (name or ip) serving the API. This MUST be the host only and does
     * not include the scheme nor sub-paths. It MAY include a port. If the host
     * is not included, the host serving the documentation is to be used
     * (including the port). The host does not support path templating.
     *
     * @see  https://swagger.io/specification/v2/
     * @see  $host
     * @link https://github.com/zero-to-prod/data-model-swagger
     */
    public const host = 'host';

    /**
     * The host (name or ip) serving the API. This MUST be the host only and does
     * not include the scheme nor sub-paths. It MAY include a port. If the host
     * is not included, the host serving the documentation is to be used
     * (including the port). The host does not support path templating.
     *
     * @see  https://swagger.io/specification/v2
     * @link https://github.com/zero-to-prod/data-model-swagger
     */
    #[Describe(['nullable'])]
    public null|string $host;

    /**
     * The base path on which the API is served, which is relative to the host.
     * If it is not included, the API is served directly under the host. The
     * value MUST start with a leading slash (/). The basePath does not
     * support path templating.
     *
     * @see  https://swagger.io/specification/v2/
     * @see  $basePath
     * @link https://github.com/zero-to-prod/data-model-swagger
     */
    public const basePath = 'basePath';

    /**
     * The base path on which the API is served, which is relative to the host.
     * If it is not included, the API is served directly under the host. The
     * value MUST start with a leading slash (/). The basePath does not
     * support path templating.
     *
     * @see  https://basePath.io/specification/v2
     * @link https://github.com/zero-to-prod/data-model-swagger
     */
    #[Describe(['nullable'])]
    public null|string $basePath;

    /**
     * The transfer protocol of the API. Values MUST be from the list: "http",
     * "https", "ws", "wss". If the schemes is not included, the default
     * scheme to be used is the one used to access the Swagger
     * definition itself.
     *
     * @see  https://swagger.io/specification/v2/
     * @see  $schemes
     * @link https://github.com/zero-to-prod/data-model-swagger
     */
    public const schemes = 'schemes';

    /**
     * The transfer protocol of the API. Values MUST be from the list: "http",
     * "https", "ws", "wss". If the schemes is not included, the default
     * scheme to be used is the one used to access the Swagger
     * definition itself.
     *
     * @see  https://swagger.io/specification/v2
     * @link https://github.com/zero-to-prod/data-model-swagger
     */
    #[Describe(['default' => []])]
    public array $schemes;

    /**
     * A list of MIME types the APIs can consume. This is global to all
     * APIs but can be overridden on specific API calls. Value MUST
     * be as described under Mime Types.
     *
     * @see  https://swagger.io/specification/v2/
     * @see  $consumes
     * @link https://github.com/zero-to-prod/data-model-swagger
     */
    public const consumes = 'consumes';

    /**
     * A list of MIME types the APIs can consume. This is global to all
     * APIs but can be overridden on specific API calls. Value MUST
     * be as described under Mime Types.
     *
     * @see  https://swagger.io/specification/v2
     * @link https://github.com/zero-to-prod/data-model-swagger
     */
    #[Describe(['default' => []])]
    public array $consumes;

    /**
     * A list of MIME types the APIs can produce. This is global
     * to all APIs but can be overridden on specific API calls.
     * Value MUST be as described under Mime Types.
     *
     * @see  https://swagger.io/specification/v2/
     * @see  $produces
     * @link https://github.com/zero-to-prod/data-model-swagger
     */
    public const produces = 'produces';

    /**
     * A list of MIME types the APIs can produce. This is global
     * to all APIs but can be overridden on specific API calls.
     * Value MUST be as described under Mime Types.
     *
     * @see  https://swagger.io/specification/v2
     * @link https://github.com/zero-to-prod/data-model-swagger
     */
    #[Describe(['default' => []])]
    public array $produces;

    /**
     * Required. The available paths and operations for the API.
     *
     * @see  https://swagger.io/specification/v2/
     * @see  $paths
     * @link https://github.com/zero-to-prod/data-model-swagger
     */
    public const paths = 'paths';

    /**
     * Required. The available paths and operations for the API.
     *
     * @var array<string, PathItem> $paths
     *
     * @see  https://swagger.io/specification/v2
     * @link https://github.com/zero-to-prod/data-model-swagger
     */
    #[Describe([
        'cast' => [self::class, 'mapOf'],
        'type' => PathItem::class,
        'required'
    ])]
    public array $paths;

    /**
     * An object to hold data types produced and consumed by operations.
     *
     * @see  https://swagger.io/specification/v2/
     * @see  $definitions
     * @link https://github.com/zero-to-prod/data-model-swagger
     */
    public const definitions = 'definitions';

    /**
     * An object to hold data types produced and consumed by operations.
     *
     * @var array<string, Schema> $definitions
     *
     * @see  https://swagger.io/specification/v2
     * @link https://github.com/zero-to-prod/data-model-swagger
     */
    #[Describe([
        'cast' => [self::class, 'mapOf'],
        'type' => Schema::class
    ])]
    public array $definitions;

    /**
     * An object to hold parameters that can be used across operations. This
     * property does not define global parameters for all operations.
     *
     * @see  https://swagger.io/specification/v2/
     * @see  $parameters
     * @link https://github.com/zero-to-prod/data-model-swagger
     */
    public const parameters = 'parameters';

    /**
     * An object to hold parameters that can be used across operations. This
     * property does not define global parameters for all operations.
     *
     * @var array<string, Parameter> $parameters
     *
     * @see  https://swagger.io/specification/v2
     * @link https://github.com/zero-to-prod/data-model-swagger
     */
    #[Describe([
        'cast' => [self::class, 'mapOf'],
        'type' => Parameter::class
    ])]
    public array $parameters;

    /**
     * An object to hold responses that can be used across operations. This
     * property does not define global responses for all operations.
     *
     * @see  https://swagger.io/specification/v2/
     * @see  $responses
     * @link https://github.com/zero-to-prod/data-model-swagger
     */
    public const responses = 'responses';

    /**
     * An object to hold responses that can be used across operations. This
     * property does not define global responses for all operations.
     *
     * @var array<string, Response> $responses
     *
     * @see  https://swagger.io/specification/v2
     * @link https://github.com/zero-to-prod/data-model-swagger
     */
    #[Describe([
        'cast' => [self::class, 'mapOf'],
        'type' => Response::class
    ])]
    public array $responses;

    /**
     * Security scheme definitions that can be used across the specification.
     *
     * @see  https://swagger.io/specification/v2/
     * @see  $securityDefinitions
     * @link https://github.com/zero-to-prod/data-model-swagger
     */
    public const securityDefinitions = 'securityDefinitions';

    /**
     * Security scheme definitions that can be used across the specification.
     *
     * @var array<string, SecurityScheme> $securityDefinitions
     *
     * @see  https://swagger.io/specification/v2
     * @link https://github.com/zero-to-prod/data-model-swagger
     */
    #[Describe([
        'cast' => [self::class, 'mapOf'],
        'type' => SecurityScheme::class
    ])]
    public array $securityDefinitions;

    /**
     * An element to hold various Objects for the OpenAPI Description.
     *
     * @see  https://swagger.io/specification/v2/
     * @see  $security
     * @link https://github.com/zero-to-prod/data-model-swagger
     */
    public const security = 'security';

    /**
     * An element to hold various Objects for the OpenAPI Description.
     *
     * @see  https://swagger.io/specification/v2
     * @link https://github.com/zero-to-prod/data-model-swagger
     */
    #[Describe(['default' => []])]
    public array $security;

    /**
     * An element to hold various Objects for the OpenAPI Description.
     *
     * @see  https://swagger.io/specification/v2/
     * @see  $tags
     * @link https://github.com/zero-to-prod/data-model-swagger
     */
    public const tags = 'tags';

    /**
     * An element to hold various Objects for the OpenAPI Description.
     *
     * @var Tag[] $tags
     *
     * @see  https://swagger.io/specification/v2
     * @link https://github.com/zero-to-prod/data-model-swagger
     */
    #[Describe([
        'cast' => [self::class, 'mapOf'],
        'type' => Tag::class,
        'default' => []
    ])]
    public array $tags;

    /**
     * Additional external documentation for this tag.
     *
     * @see  https://swagger.io/specification/v2/
     * @see  $externalDocs
     * @link https://github.com/zero-to-prod/data-model-swagger
     */
    public const externalDocs = 'externalDocs';

    /**
     * Additional external documentation for this tag.
     *
     * @see  https://swagger.io/specification/v2
     * @link https://github.com/zero-to-prod/data-model-swagger
     */
    #[Describe(['nullable'])]
    public ?ExternalDocumentation $externalDocs;
}