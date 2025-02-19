<?php

namespace Zerotoprod\DataModelSwagger;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\DataModelSwagger\Helpers\DataModel;

/**
 * Allows adding meta data to a single tag that is used by the
 * Operation Object. It is not mandatory to have a Tag Object
 * per tag used there.
 *
 * @see  https://swagger.io/specification/v2
 * @link https://github.com/zero-to-prod/data-model-swagger
 */
class Tag
{
    use DataModel;

    /**
     * **REQUIRED**. The name of the tag.
     *
     * @see  https://swagger.io/specification/v2/
     * @see  $name
     * @link https://github.com/zero-to-prod/data-model-swagger
     */
    public const name = 'name';

    /**
     * **REQUIRED**. The name of the tag.
     *
     * @see  https://swagger.io/specification/v2
     * @link https://github.com/zero-to-prod/data-model-swagger
     */
    #[Describe(['required'])]
    public string $name;

    /**
     * A short description for the tag. GFM syntax can be
     * used for rich text representation.
     *
     * @see  https://swagger.io/specification/v2/
     * @see  https://guides.github.com/features/mastering-markdown/#-git-hub-flavored-markdown
     * @see  $description
     * @link https://github.com/zero-to-prod/data-model-swagger
     */
    public const description = 'description';

    /**
     * A short description for the tag. GFM syntax can be
     * used for rich text representation.
     *
     * @see  https://swagger.io/specification/v2/
     * @see  https://guides.github.com/features/mastering-markdown/#-git-hub-flavored-markdown
     * @link https://github.com/zero-to-prod/data-model-swagger
     */
    #[Describe(['nullable'])]
    public ?string $description;

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
