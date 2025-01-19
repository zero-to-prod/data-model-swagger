<?php

namespace Zerotoprod\DataModelSwagger;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\DataModelSwagger\Helpers\DataModel;

/**
 * fka Swagger RESTful API Documentation Specification
 *
 * @link https://swagger.io/specification/v2/
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
     * @link https://swagger.io/specification/v2/
     * @see  $swagger
     */
    public const swagger = 'swagger';

    /**
     * **REQUIRED**. Specifies the Swagger Specification version
     * being used. It can be used by the Swagger UI and other
     * clients to interpret the API listing. The value MUST
     * be "2.0".
     *
     * @link https://swagger.io/specification/v2/
     */
    #[Describe(['required'])]
    public string $swagger;

    /**
     * **Required**. Provides metadata about the API. The
     * metadata can be used by the clients if needed.
     *
     * @link https://swagger.io/specification/v2/
     * @see  $info
     */
    public const info = 'info';

    /**
     * **Required**. Provides metadata about the API. The
     * metadata can be used by the clients if needed.
     *
     * @link https://swagger.io/specification/v2/
     */
    #[Describe(['required'])]
    public Info $info;

    /**
     * The host (name or ip) serving the API. This MUST be the host only and does
     * not include the scheme nor sub-paths. It MAY include a port. If the host
     * is not included, the host serving the documentation is to be used
     * (including the port). The host does not support path templating.
     *
     * @link https://swagger.io/specification/v2/
     * @see  $host
     */
    public const host = 'host';

    /**
     * The host (name or ip) serving the API. This MUST be the host only and does
     * not include the scheme nor sub-paths. It MAY include a port. If the host
     * is not included, the host serving the documentation is to be used
     * (including the port). The host does not support path templating.
     *
     * @link https://swagger.io/specification/v2/
     */
    #[Describe(['nullable'])]
    public null|string $host;

    /**
     * The base path on which the API is served, which is relative to the host.
     * If it is not included, the API is served directly under the host. The
     * value MUST start with a leading slash (/). The basePath does not
     * support path templating.
     *
     * @link https://swagger.io/specification/v2/
     * @see  $basePath
     */
    public const basePath = 'basePath';

    /**
     * The base path on which the API is served, which is relative to the host.
     * If it is not included, the API is served directly under the host. The
     * value MUST start with a leading slash (/). The basePath does not
     * support path templating.
     *
     * @link https://basePath.io/specification/v2/
     */
    #[Describe(['nullable'])]
    public null|string $basePath;

    /**
     * The transfer protocol of the API. Values MUST be from the list: "http",
     * "https", "ws", "wss". If the schemes is not included, the default
     * scheme to be used is the one used to access the Swagger
     * definition itself.
     *
     * @link https://swagger.io/specification/v2/
     * @see  $schemes
     */
    public const schemes = 'schemes';

    /**
     * The transfer protocol of the API. Values MUST be from the list: "http",
     * "https", "ws", "wss". If the schemes is not included, the default
     * scheme to be used is the one used to access the Swagger
     * definition itself.
     *
     * @link https://swagger.io/specification/v2/
     */
    #[Describe(['default' => []])]
    public array $schemes;

    /**
     * A list of MIME types the APIs can consume. This is global to all
     * APIs but can be overridden on specific API calls. Value MUST
     * be as described under Mime Types.
     *
     * @link https://swagger.io/specification/v2/
     * @see  $consumes
     */
    public const consumes = 'consumes';

    /**
     * A list of MIME types the APIs can consume. This is global to all
     * APIs but can be overridden on specific API calls. Value MUST
     * be as described under Mime Types.
     *
     * @link https://swagger.io/specification/v2/
     */
    #[Describe(['default' => []])]
    public array $consumes;

    /**
     * A list of MIME types the APIs can produce. This is global
     * to all APIs but can be overridden on specific API calls.
     * Value MUST be as described under Mime Types.
     *
     * @link https://swagger.io/specification/v2/
     * @see  $produces
     */
    public const produces = 'produces';

    /**
     * A list of MIME types the APIs can produce. This is global
     * to all APIs but can be overridden on specific API calls.
     * Value MUST be as described under Mime Types.
     *
     * @link https://swagger.io/specification/v2/
     */
    #[Describe(['default' => []])]
    public array $produces;

    /**
     * Required. The available paths and operations for the API.
     *
     * @link https://swagger.io/specification/v2/
     * @see  $paths
     */
    public const paths = 'paths';

    /**
     * Required. The available paths and operations for the API.
     *
     * @var array<string, PathItem> $paths
     *
     * @link https://swagger.io/specification/v2/
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
     * @link https://swagger.io/specification/v2/
     * @see  $definitions
     */
    public const definitions = 'definitions';

    /**
     * An object to hold data types produced and consumed by operations.
     *
     * @var array<string, Schema> $definitions
     *
     * @link https://swagger.io/specification/v2/
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
     * @link https://swagger.io/specification/v2/
     * @see  $parameters
     */
    public const parameters = 'parameters';

    /**
     * An object to hold parameters that can be used across operations. This
     * property does not define global parameters for all operations.
     *
     * @var array<string, Parameter> $parameters
     *
     * @link https://swagger.io/specification/v2/
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
     * @link https://swagger.io/specification/v2/
     * @see  $responses
     */
    public const responses = 'responses';

    /**
     * An object to hold responses that can be used across operations. This
     * property does not define global responses for all operations.
     *
     * @var array<string, Response> $responses
     *
     * @link https://swagger.io/specification/v2/
     */
    #[Describe([
        'cast' => [self::class, 'mapOf'],
        'type' => Response::class
    ])]
    public array $responses;

    /**
     * Security scheme definitions that can be used across the specification.
     *
     * @link https://swagger.io/specification/v2/
     * @see  $securityDefinitions
     */
    public const securityDefinitions = 'securityDefinitions';

    /**
     * Security scheme definitions that can be used across the specification.
     *
     * @var array<string, SecurityScheme> $securityDefinitions
     *
     * @link https://swagger.io/specification/v2/
     */
    #[Describe([
        'cast' => [self::class, 'mapOf'],
        'type' => SecurityScheme::class
    ])]
    public array $securityDefinitions;

    /**
     * An element to hold various Objects for the OpenAPI Description.
     *
     * @link https://swagger.io/specification/v2/
     * @see  $security
     */
    public const security = 'security';

    /**
     * An element to hold various Objects for the OpenAPI Description.
     *
     * @link https://swagger.io/specification/v2/
     */
    #[Describe(['default' => []])]
    public array $security;

    /**
     * An element to hold various Objects for the OpenAPI Description.
     *
     * @link https://swagger.io/specification/v2/
     * @see  $tags
     */
    public const tags = 'tags';

    /**
     * An element to hold various Objects for the OpenAPI Description.
     *
     * @var Tag[] $tags
     *
     * @link https://swagger.io/specification/v2/
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
     * @link https://swagger.io/specification/v2/
     * @see  $externalDocs
     */
    public const externalDocs = 'externalDocs';

    /**
     * Additional external documentation for this tag.
     *
     * @link https://swagger.io/specification/v2/
     */
    #[Describe(['nullable'])]
    public ?ExternalDocumentation $externalDocs;
}