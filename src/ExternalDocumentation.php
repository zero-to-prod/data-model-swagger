<?php

namespace Zerotoprod\DataModelSwagger;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\DataModelSwagger\Helpers\DataModel;

/**
 * Allows referencing an external resource for extended documentation.
 *
 * @link https://swagger.io/specification/v2/
 */
class ExternalDocumentation
{
    use DataModel;

    /**
     * A short description of the target documentation. GFM
     * syntax can be used for rich text representation.
     *
     * @link https://swagger.io/specification/v2/
     * @see  https://guides.github.com/features/mastering-markdown/#-git-hub-flavored-markdown
     *
     * @see  $description
     */
    public const description = 'description';

    /**
     * A short description of the target documentation. GFM
     * syntax can be used for rich text representation.
     *
     * @link https://swagger.io/specification/v2/
     * @see  https://guides.github.com/features/mastering-markdown/#-git-hub-flavored-markdown
     */
    #[Describe(['nullable'])]
    public ?string $description;

    /**
     * **REQUIRED**. The URL for the target documentation. This _MUST_ be
     * in the form of a URL.
     *
     * @link https://swagger.io/specification/v2/
     * @see  $url
     */
    public const url = 'url';

    /**
     * **REQUIRED**. The URL for the target documentation. This _MUST_ be
     * in the form of a URL.
     *
     * @link https://swagger.io/specification/v2/
     */
    #[Describe(['nullable'])]
    public ?string $url;
}
