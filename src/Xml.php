<?php

namespace Zerotoprod\DataModelSwagger;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\DataModelSwagger\Helpers\DataModel;

/**
 * A metadata object that allows for more fine-tuned XML model definitions.
 *
 * When using arrays, XML element names are not inferred (for singular/plural
 * forms) and the name property should be used to add that information.
 * See examples for expected behavior.
 *
 * https://swagger.io/specification/v2
 * @link https://github.com/zero-to-prod/data-model-swagger
 * DataModels for Swagger 2.0.*
 */
class Xml
{
    use DataModel;

    /**
     * Replaces the name of the element/attribute used for the described schema property.
     * When defined within the Items Object (items), it will affect the name of the
     * individual XML elements within the list. When defined alongside type being
     * array (outside the items), it will affect the wrapping element and only
     * if wrapped is true. If wrapped is false, it will be ignored.
     *
     * https://swagger.io/specification/v2/
     * @see  $name
     * @link https://github.com/zero-to-prod/data-model-swagger
     */
    public const name = 'name';

    /**
     * Replaces the name of the element/attribute used for the described schema property.
     * When defined within the Items Object (items), it will affect the name of the
     * individual XML elements within the list. When defined alongside type being
     * array (outside the items), it will affect the wrapping element and only
     * if wrapped is true. If wrapped is false, it will be ignored.
     *
     * https://swagger.io/specification/v2
     * @link https://github.com/zero-to-prod/data-model-swagger
     */
    #[Describe(['nullable'])]
    public ?string $name;

    /**
     * The URL of the namespace definition. Value SHOULD be in the form of a URL.
     *
     * https://swagger.io/specification/v2/
     * @see  $namespace
     * @link https://github.com/zero-to-prod/data-model-swagger
     */
    public const namespace = 'namespace';

    /**
     * The URL of the namespace definition. Value SHOULD be in the form of a URL.
     *
     * https://swagger.io/specification/v2
     * @link https://github.com/zero-to-prod/data-model-swagger
     */
    #[Describe(['nullable'])]
    public ?string $namespace;

    /**
     * The prefix to be used for the name.
     *
     * https://swagger.io/specification/v2/
     * @see  $prefix
     * @link https://github.com/zero-to-prod/data-model-swagger
     */
    public const prefix = 'prefix';

    /**
     * The prefix to be used for the name.
     *
     * https://swagger.io/specification/v2
     * @link https://github.com/zero-to-prod/data-model-swagger
     */
    #[Describe(['nullable'])]
    public ?string $prefix;

    /**
     * Declares whether the property definition translates to an attribute
     * instead of an element. Default value is `false`.
     *
     * https://swagger.io/specification/v2/
     * @see  $attribute
     * @link https://github.com/zero-to-prod/data-model-swagger
     */
    public const attribute = 'attribute';

    /**
     * Declares whether the property definition translates to an attribute
     * instead of an element. Default value is `false`.
     *
     * https://swagger.io/specification/v2
     * @link https://github.com/zero-to-prod/data-model-swagger
     */
    #[Describe(['default' => false])]
    public bool $attribute;

    /**
     * _MAY_ be used only for an array definition. Signifies whether the
     * array is wrapped (for example, `<books><book/><book/></books>`) or
     * unwrapped (`<book/><book/>`). Default value is `false`. The
     * definition takes effect only when defined alongside `type`
     * being `"array"` (outside the `items`).
     *
     * https://swagger.io/specification/v2/
     * @see  $wrapped
     * @link https://github.com/zero-to-prod/data-model-swagger
     */
    public const wrapped = 'wrapped';

    /**
     * _MAY_ be used only for an array definition. Signifies whether the
     * array is wrapped (for example, `<books><book/><book/></books>`) or
     * unwrapped (`<book/><book/>`). Default value is `false`. The
     * definition takes effect only when defined alongside `type`
     * being `"array"` (outside the `items`).
     *
     * https://swagger.io/specification/v2
     * @link https://github.com/zero-to-prod/data-model-swagger
     */
    #[Describe(['default' => false])]
    public bool $wrapped;
}
