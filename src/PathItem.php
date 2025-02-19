<?php

namespace Zerotoprod\DataModelSwagger;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\DataModelSwagger\Helpers\DataModel;

/**
 * Describes the operations available on a single path. A Path Item may be empty, due to ACL constraints. The path itself is still exposed to the documentation viewer but they will not know which operations and parameters are available.
 *
 * @see  https://swagger.io/specification/v2/
 * @see  https://swagger.io/specification/v2/#security-filtering
 * @link https://github.com/zero-to-prod/data-model-swagger
 */
class PathItem
{
    use DataModel;

    /**
     * Allows for an external definition of this path item. The referenced structure
     * MUST be in the format of a Path Item Object. If there are conflicts between
     * the referenced definition and this Path Item's definition, the behavior is
     * undefined.
     *
     * @see  https://swagger.io/specification/v2/
     * @see  $ref
     * @link https://github.com/zero-to-prod/data-model-swagger
     */
    public const ref = '$ref';

    /**
     * Allows for an external definition of this path item. The referenced structure
     * MUST be in the format of a Path Item Object. If there are conflicts between
     * the referenced definition and this Path Item's definition, the behavior is
     * undefined.
     *
     * @see  https://swagger.io/specification/v2
     * @link https://github.com/zero-to-prod/data-model-swagger
     */
    #[Describe(['nullable', 'from' => self::ref])]
    public ?string $ref;

    /**
     * A definition of a GET operation on this path.
     *
     * @see  https://swagger.io/specification/v2/
     * @see  $get
     * @link https://github.com/zero-to-prod/data-model-swagger
     */
    public const get = 'get';

    /**
     * A definition of a GET operation on this path.
     *
     * @see  https://swagger.io/specification/v2
     * @link https://github.com/zero-to-prod/data-model-swagger
     */
    #[Describe(['nullable'])]
    public ?Operation $get;

    /**
     * A definition of a PUT operation on this path.
     *
     * @see  https://swagger.io/specification/v2/
     * @see  $put
     * @link https://github.com/zero-to-prod/data-model-swagger
     */
    public const put = 'put';

    /**
     * A definition of a PUT operation on this path.
     *
     * @see  https://swagger.io/specification/v2
     * @link https://github.com/zero-to-prod/data-model-swagger
     */
    #[Describe(['nullable'])]
    public ?Operation $put;

    /**
     * A definition of a POST operation on this path.
     *
     * @see  https://swagger.io/specification/v2/
     * @see  $post
     * @link https://github.com/zero-to-prod/data-model-swagger
     */
    public const post = 'post';

    /**
     * A definition of a POST operation on this path.
     *
     * @see  https://swagger.io/specification/v2
     * @link https://github.com/zero-to-prod/data-model-swagger
     */
    #[Describe(['nullable'])]
    public ?Operation $post;

    /**
     * A definition of a DELETE operation on this path.
     *
     * @see  https://swagger.io/specification/v2/
     * @see  $delete
     * @link https://github.com/zero-to-prod/data-model-swagger
     */
    public const delete = 'delete';

    /**
     * A definition of a DELETE operation on this path.
     *
     * @see  https://swagger.io/specification/v2
     * @link https://github.com/zero-to-prod/data-model-swagger
     */
    #[Describe(['nullable'])]
    public ?Operation $delete;

    /**
     * A definition of a OPTIONS operation on this path.
     *
     * @see  https://swagger.io/specification/v2/
     * @see  $options
     * @link https://github.com/zero-to-prod/data-model-swagger
     */
    public const options = 'options';

    /**
     * A definition of a OPTIONS operation on this path.
     *
     * @see  https://swagger.io/specification/v2
     * @link https://github.com/zero-to-prod/data-model-swagger
     */
    #[Describe(['nullable'])]
    public ?Operation $options;

    /**
     * A definition of a HEAD operation on this path.
     *
     * @see  https://swagger.io/specification/v2/
     * @see  $head
     * @link https://github.com/zero-to-prod/data-model-swagger
     */
    public const head = 'head';

    /**
     * A definition of a HEAD operation on this path.
     *
     * @see  https://swagger.io/specification/v2
     * @link https://github.com/zero-to-prod/data-model-swagger
     */
    #[Describe(['nullable'])]
    public ?Operation $head;

    /**
     * A definition of a PATCH operation on this path.
     *
     * @see  https://swagger.io/specification/v2/
     * @see  $patch
     * @link https://github.com/zero-to-prod/data-model-swagger
     */
    public const patch = 'patch';

    /**
     * A definition of a PATCH operation on this path.
     *
     * @see  https://swagger.io/specification/v2
     * @link https://github.com/zero-to-prod/data-model-swagger
     */
    #[Describe(['nullable'])]
    public ?Operation $patch;

    /**
     * A list of parameters that are applicable for all the operations described under this path.
     * These parameters can be overridden at the operation level, but cannot be removed there.
     * The list MUST NOT include duplicated parameters. A unique parameter is defined by a
     * combination of a name and location. The list can use the Reference Object to link
     * to parameters that are defined at the Swagger Object's parameters. There can be
     * one "body" parameter at most.
     *
     * @see  https://swagger.io/specification/v2/
     * @see  $parameters
     * @link https://github.com/zero-to-prod/data-model-swagger
     */
    public const parameters = 'parameters';

    /**
     * A list of parameters that are applicable for all the operations described under this path.
     * These parameters can be overridden at the operation level, but cannot be removed there.
     * The list MUST NOT include duplicated parameters. A unique parameter is defined by a
     * combination of a name and location. The list can use the Reference Object to link
     * to parameters that are defined at the Swagger Object's parameters. There can be
     * one "body" parameter at most.
     *
     * @see  https://swagger.io/specification/v2
     * @link https://github.com/zero-to-prod/data-model-swagger
     */
    #[Describe([
        'cast' => [self::class, 'parameters'],
        'default' => []
    ])]
    public array $parameters;

    /**
     * A list of parameters that are applicable for all the operations described under this path.
     * These parameters can be overridden at the operation level, but cannot be removed there.
     * The list MUST NOT include duplicated parameters. A unique parameter is defined by a
     * combination of a name and location. The list can use the Reference Object to link
     * to parameters that are defined at the Swagger Object's parameters. There can be
     * one "body" parameter at most.
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

}
