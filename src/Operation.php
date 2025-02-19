<?php

namespace Zerotoprod\DataModelSwagger;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\DataModel\PropertyRequiredException;
use Zerotoprod\DataModelSwagger\Helpers\DataModel;

/**
 * Describes a single API operation on a path.
 *
 * @see  https://swagger.io/specification/v2
 * @link https://github.com/zero-to-prod/data-model-swagger
 */
class Operation
{
    use DataModel;

    /**
     * A list of tags for API documentation control. Tags can be used for
     * logical grouping of operations by resources or any other qualifier.
     *
     * @see  https://swagger.io/specification/v2/
     * @see  $tags
     * @link https://github.com/zero-to-prod/data-model-swagger
     */
    public const tags = 'tags';

    /**
     * A list of tags for API documentation control. Tags can be used for
     * logical grouping of operations by resources or any other qualifier.
     *
     * @var string[] $tags
     *
     * @see  https://swagger.io/specification/v2
     * @link https://github.com/zero-to-prod/data-model-swagger
     */
    #[Describe(['default' => []])]
    public array $tags;

    /**
     * A short summary of what the operation does. For maximum readability
     * in the swagger-ui, this field SHOULD be less than 120 characters.
     *
     * @see  https://swagger.io/specification/v2/
     * @see  $summary
     * @link https://github.com/zero-to-prod/data-model-swagger
     */
    public const summary = 'summary';

    /**
     * A short summary of what the operation does. For maximum readability
     * in the swagger-ui, this field SHOULD be less than 120 characters.
     *
     * @see  https://swagger.io/specification/v2
     * @link https://github.com/zero-to-prod/data-model-swagger
     */
    #[Describe(['nullable'])]
    public ?string $summary;

    /**
     * A verbose explanation of the operation behavior. GFM
     *  syntax can be used for rich text representation.
     *
     * @see  https://swagger.io/specification/v2/
     * @see  https://guides.github.com/features/mastering-markdown/#-git-hub-flavored-markdown
     * @see  $description
     * @link https://github.com/zero-to-prod/data-model-swagger
     */
    public const description = 'description';

    /**
     * A verbose explanation of the operation behavior. GFM
     * syntax can be used for rich text representation.
     *
     * @see  https://swagger.io/specification/v2/
     * @see  https://guides.github.com/features/mastering-markdown/#-git-hub-flavored-markdown
     * @link https://github.com/zero-to-prod/data-model-swagger
     */
    #[Describe(['nullable'])]
    public ?string $description;

    /**
     * Additional external documentation for this operation.
     *
     * @see  https://swagger.io/specification/v2/
     * @see  $externalDocs
     * @link https://github.com/zero-to-prod/data-model-swagger
     */
    public const externalDocs = 'externalDocs';

    /**
     * Additional external documentation for this operation.
     *
     * @see  https://swagger.io/specification/v2
     * @link https://github.com/zero-to-prod/data-model-swagger
     */
    #[Describe(['nullable'])]
    public ?ExternalDocumentation $externalDocs;

    /**
     * Unique string used to identify the operation. The id MUST be unique among
     * all operations described in the API. Tools and libraries MAY use the
     * operationId to uniquely identify an operation, therefore, it is
     * recommended to follow common programming naming conventions.
     *
     * @see  https://swagger.io/specification/v2/
     * @see  $operationId
     * @link https://github.com/zero-to-prod/data-model-swagger
     */
    public const operationId = 'operationId';

    /**
     * Unique string used to identify the operation. The id MUST be unique among
     * all operations described in the API. Tools and libraries MAY use the
     * operationId to uniquely identify an operation, therefore, it is
     * recommended to follow common programming naming conventions.
     *
     * @see  https://swagger.io/specification/v2
     * @link https://github.com/zero-to-prod/data-model-swagger
     */
    #[Describe(['nullable'])]
    public ?string $operationId;

    /**
     * A list of MIME types the operation can consume. This overrides the consumes
     * definition at the Swagger Object. An empty value MAY be used to clear the
     * global definition. Value MUST be as described under Mime Types.
     *
     * @see  https://swagger.io/specification/v2/
     * @see  https://swagger.io/specification/v2/#mime-types
     * @see  $tags
     * @link https://github.com/zero-to-prod/data-model-swagger
     */
    public const consumes = 'consumes';

    /**
     * A list of MIME types the operation can consume. This overrides the consumes
     * definition at the Swagger Object. An empty value MAY be used to clear the
     * global definition. Value MUST be as described under Mime Types.
     *
     * @var string[] $consumes
     *
     * @see  https://swagger.io/specification/v2/
     * @see  https://swagger.io/specification/v2/#mime-types
     * @link https://github.com/zero-to-prod/data-model-swagger
     */
    #[Describe(['default' => []])]
    public array $consumes;

    /**
     * A list of MIME types the operation can produce. This overrides the produces definition
     * at the Swagger Object. An empty value MAY be used to clear the global definition.
     * Value MUST be as described under Mime Types.
     *
     * @see  https://swagger.io/specification/v2/
     * @see  https://swagger.io/specification/v2/#mime-types
     * @see  $tags
     * @link https://github.com/zero-to-prod/data-model-swagger
     */
    public const produces = 'produces';

    /**
     * A list of MIME types the operation can produce. This overrides the produces definition
     * at the Swagger Object. An empty value MAY be used to clear the global definition.
     * Value MUST be as described under Mime Types.
     *
     * @var string[] $produces
     *
     * @see  https://swagger.io/specification/v2/
     * @see  https://swagger.io/specification/v2/#mime-types
     * @link https://github.com/zero-to-prod/data-model-swagger
     */
    #[Describe(['default' => []])]
    public array $produces;

    /**
     * A list of parameters that are applicable for this operation. If a parameter
     * is already defined at the Path Item, the new definition will override it,
     * but can never remove it. The list MUST NOT include duplicated parameters.
     * A unique parameter is defined by a combination of a name and location.
     * The list can use the Reference Object to link to parameters that are
     * defined at the Swagger Object's parameters. There can be one "body"
     * parameter at most.
     *
     * @see  https://swagger.io/specification/v2/
     * @see  $parameters
     * @link https://github.com/zero-to-prod/data-model-swagger
     */
    public const parameters = 'parameters';

    /**
     * A list of parameters that are applicable for this operation. If a parameter
     * is already defined at the Path Item, the new definition will override it,
     * but can never remove it. The list MUST NOT include duplicated parameters.
     * A unique parameter is defined by a combination of a name and location.
     * The list can use the Reference Object to link to parameters that are
     * defined at the Swagger Object's parameters. There can be one "body"
     * parameter at most.
     *
     * @var array<string, Parameter|Reference> $parameters
     *
     * @see  https://swagger.io/specification/v2
     * @link https://github.com/zero-to-prod/data-model-swagger
     */
    #[Describe(['cast' => [self::class, 'parameters']])]
    public array $parameters;

    /**
     * A list of parameters that are applicable for this operation. If a parameter
     * is already defined at the Path Item, the new definition will override it,
     * but can never remove it. The list MUST NOT include duplicated parameters.
     * A unique parameter is defined by a combination of a name and location.
     * The list can use the Reference Object to link to parameters that are
     * defined at the Swagger Object's parameters. There can be one "body"
     * parameter at most.
     *
     * @see  https://swagger.io/specification/v2/
     * @see  $parameters
     * @link https://github.com/zero-to-prod/data-model-swagger
     */
    public static function parameters($value, array $context): array
    {
        return isset($context[self::parameters])
            ? array_map(
                static fn($value) => isset($value[Reference::ref])
                    ? Reference::from($value)
                    : Parameter::from($value),
                $value
            )
            : [];
    }

    /**
     * **REQUIRED**. The list of possible responses as they are returned
     * from executing this operation.
     *
     * @see  https://swagger.io/specification/v2/
     * @see  $responses
     * @link https://github.com/zero-to-prod/data-model-swagger
     */
    public const responses = 'responses';

    /**
     * **REQUIRED**. The list of possible responses as they are returned
     * from executing this operation.
     *
     * @var array<string, Response> $examples
     *
     * @see  https://swagger.io/specification/v2
     * @link https://github.com/zero-to-prod/data-model-swagger
     */
    #[Describe(['cast' => [self::class, 'responses']])]
    public array $responses;

    /**
     * **REQUIRED**. The list of possible responses as they are returned
     * from executing this operation.
     *
     * @see  https://swagger.io/specification/v2/
     * @see  $responses
     * @link https://github.com/zero-to-prod/data-model-swagger
     */
    public static function responses($value, array $context): array
    {
        if (!isset($context[self::responses])) {
            throw new PropertyRequiredException('Property `$responses` is required.');
        }

        return array_map(static fn($value) => Response::from($value), $value);
    }

    /**
     * The transfer protocol for the operation. Values MUST be from the list:
     * "http", "https", "ws", "wss". The value overrides the Swagger Object
     * schemes definition.
     *
     * @see  https://swagger.io/specification/v2/
     * @see  $schemes
     * @link https://github.com/zero-to-prod/data-model-swagger
     */
    public const schemes = 'schemes';

    /**
     * The transfer protocol for the operation. Values MUST be from the list:
     * "http", "https", "ws", "wss". The value overrides the Swagger Object
     * schemes definition.
     *
     * @var string[] $schemes
     *
     * @see  https://swagger.io/specification/v2
     * @link https://github.com/zero-to-prod/data-model-swagger
     */
    #[Describe(['default' => []])]
    public array $schemes;

    /**
     * Declares this operation to be deprecated. Consumers _SHOULD_ refrain
     * from usage of the declared operation. Default value is `false`.
     *
     * @see  https://swagger.io/specification/v2/
     * @see  $deprecated
     * @link https://github.com/zero-to-prod/data-model-swagger
     */
    public const deprecated = 'deprecated';

    /**
     * Declares this operation to be deprecated. Consumers _SHOULD_ refrain
     * from usage of the declared operation. Default value is `false`.
     *
     * @see  https://swagger.io/specification/v2
     * @link https://github.com/zero-to-prod/data-model-swagger
     */
    #[Describe(['default' => false])]
    public bool $deprecated;

    /**
     * A declaration of which security schemes are applied for this operation.
     * The list of values describes alternative security schemes that can be
     * used (that is, there is a logical OR between the security
     * requirements). This definition overrides any declared
     * top-level security. To remove a top-level security
     * declaration, an empty array can be used.
     *
     * @see  https://swagger.io/specification/v2/
     * @see  $security
     * @link https://github.com/zero-to-prod/data-model-swagger
     */
    public const security = 'security';

    /**
     * A declaration of which security schemes are applied for this operation.
     * The list of values describes alternative security schemes that can be
     * used (that is, there is a logical OR between the security
     * requirements). This definition overrides any declared
     * top-level security. To remove a top-level security
     * declaration, an empty array can be used.
     *
     * @var array<string, string[]> $security
     *
     * @see  https://swagger.io/specification/v2
     * @link https://github.com/zero-to-prod/data-model-swagger
     */
    #[Describe(['default' => []])]
    public array $security;
}
