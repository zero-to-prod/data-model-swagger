<?php

namespace Zerotoprod\DataModelSwagger;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\DataModelHelper\DataModelHelper;
use Zerotoprod\DataModelSwagger\Helpers\DataModel;

/**
 * Describes a single response from an API Operation.
 *
 * @see  https://swagger.io/specification/v2
 * @link https://github.com/zero-to-prod/data-model-swagger
 */
class Response
{
    use DataModel;
    use DataModelHelper;

    /**
     * Required. A short description of the response. GFM
     * syntax can be used for rich text representation.
     *
     * @see  https://swagger.io/specification/v2/
     * @see  https://guides.github.com/features/mastering-markdown/#-git-hub-flavored-markdown
     * @see  $description
     * @link https://github.com/zero-to-prod/data-model-swagger
     */
    public const description = 'description';

    /**
     * Required. A short description of the response. GFM
     * syntax can be used for rich text representation.
     *
     * @see  https://swagger.io/specification/v2/
     * @see  https://guides.github.com/features/mastering-markdown/#-git-hub-flavored-markdown
     * @link https://github.com/zero-to-prod/data-model-swagger
     */
    #[Describe(['nullable'])]
    public ?string $description;

    /**
     * A definition of the response structure. It can be a primitive, an
     * array or an object. If this field does not exist, it means no
     * content is returned as part of the response. As an extension
     * to the Schema Object, its root type value may also be "file".
     * This SHOULD be accompanied by a relevant produces mime-type.
     *
     * @see  https://swagger.io/specification/v2/
     * @see  $schema
     * @link https://github.com/zero-to-prod/data-model-swagger
     */
    public const schema = 'schema';

    /**
     * A definition of the response structure. It can be a primitive, an
     * array or an object. If this field does not exist, it means no
     * content is returned as part of the response. As an extension
     * to the Schema Object, its root type value may also be "file".
     * This SHOULD be accompanied by a relevant produces mime-type.
     *
     * @see  https://swagger.io/specification/v2
     * @link https://github.com/zero-to-prod/data-model-swagger
     */
    #[Describe(['cast' => [self::class, 'schema']])]
    public null|Schema $schema;

    /**
     * The schema defining the type used for the parameter.
     *
     * @see  https://swagger.io/specification/v2/
     * @see  $schema
     * @link https://github.com/zero-to-prod/data-model-swagger
     */
    public static function schema($value, array $context): Schema|null
    {
        if (!isset($context[self::schema])) {
            return null;
        }

        return Schema::from($value);
    }

    /**
     * A list of headers that are sent with the response.
     *
     * @see  https://swagger.io/specification/v2/
     * @see  $headers
     * @link https://github.com/zero-to-prod/data-model-swagger
     */
    public const headers = 'headers';

    /**
     *A list of headers that are sent with the response.
     *
     * @var array<string, Header> $headers
     *
     * @see  https://swagger.io/specification/v2
     * @link https://github.com/zero-to-prod/data-model-swagger
     */
    #[Describe([
        'cast' => [self::class, 'mapOf'],
        'type' => Header::class,
        'default' => []
    ])]
    public array $headers;

    /**
     * An example of the response message.
     *
     * @see  https://swagger.io/specification/v2/
     * @see  $examples
     * @link https://github.com/zero-to-prod/data-model-swagger
     */
    public const examples = 'examples';

    /**
     * An example of the response message.
     *
     * @see  https://swagger.io/specification/v2
     * @link https://github.com/zero-to-prod/data-model-swagger
     */
    #[Describe(['default' => []])]
    public array $examples;
}
