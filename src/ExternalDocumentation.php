<?php

namespace Zerotoprod\DataModelSwagger;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\DataModelSwagger\Helpers\DataModel;

/**
 * Allows referencing an external resource for extended documentation.
 *
 * @see  https://swagger.io/specification/v2
 * @link https://github.com/zero-to-prod/data-model-swagger
 */
class ExternalDocumentation
{
    use DataModel;

    /**
     * A short description of the target documentation. GFM
     * syntax can be used for rich text representation.
     *
     * @see  https://swagger.io/specification/v2/
     * @see  https://guides.github.com/features/mastering-markdown/#-git-hub-flavored-markdown
     *
     * @see  $description
     * @link https://github.com/zero-to-prod/data-model-swagger
     */
    public const description = 'description';

    /**
     * A short description of the target documentation. GFM
     * syntax can be used for rich text representation.
     *
     * @see  https://swagger.io/specification/v2/
     * @see  https://guides.github.com/features/mastering-markdown/#-git-hub-flavored-markdown
     * @link https://github.com/zero-to-prod/data-model-swagger
     */
    #[Describe(['nullable'])]
    public ?string $description;

    /**
     * **REQUIRED**. The URL for the target documentation. This _MUST_ be
     * in the form of a URL.
     *
     * @see  https://swagger.io/specification/v2/
     * @see  $url
     * @link https://github.com/zero-to-prod/data-model-swagger
     */
    public const url = 'url';

    /**
     * **REQUIRED**. The URL for the target documentation. This _MUST_ be
     * in the form of a URL.
     *
     * @see  https://swagger.io/specification/v2
     * @link https://github.com/zero-to-prod/data-model-swagger
     */
    #[Describe(['nullable'])]
    public ?string $url;
}
