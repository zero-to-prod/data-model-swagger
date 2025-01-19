<?php

namespace Zerotoprod\DataModelSwagger;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\DataModelSwagger\Helpers\DataModel;

/**
 * Allows adding meta data to a single tag that is used by the
 * Operation Object. It is not mandatory to have a Tag Object
 * per tag used there.
 *
 * @link https://swagger.io/specification/v2/
 */
class Tag
{
    use DataModel;

    /**
     * **REQUIRED**. The name of the tag.
     *
     * @link https://swagger.io/specification/v2/
     * @see  $name
     */
    public const name = 'name';

    /**
     * **REQUIRED**. The name of the tag.
     *
     * @link https://swagger.io/specification/v2/
     */
    #[Describe(['required'])]
    public string $name;

    /**
     * A short description for the tag. GFM syntax can be
     * used for rich text representation.
     *
     * @link https://swagger.io/specification/v2/
     * @see https://guides.github.com/features/mastering-markdown/#-git-hub-flavored-markdown
     * @see  $description
     */
    public const description = 'description';

    /**
     * A short description for the tag. GFM syntax can be
     * used for rich text representation.
     *
     * @link https://swagger.io/specification/v2/
     * @see https://guides.github.com/features/mastering-markdown/#-git-hub-flavored-markdown
     */
    #[Describe(['nullable'])]
    public ?string $description;

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
