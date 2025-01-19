<?php

namespace Zerotoprod\DataModelSwagger;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\DataModelSwagger\Helpers\DataModel;

/**
 * License information for the exposed API.
 *
 * @link https://swagger.io/specification/v2/
 */
class License
{
    use DataModel;

    /**
     * **REQUIRED**. The license name used for the API.
     *
     * @link https://swagger.io/specification/v2/
     * @see  $name
     */
    public const name = 'name';

    /**
     * **REQUIRED**. The license name used for the API.
     *
     * @link https://swagger.io/specification/v2/
     */
    #[Describe(['required'])]
    public string $name;

    /**
     * A URL for the license used for the API. This _MUST_ be in the form of a URL.
     *
     * @link https://swagger.io/specification/v2/
     * @see  $url
     */
    public const url = 'url';

    /**
     * A URL for the license used for the API. This _MUST_ be in the form of a URL.
     *
     * @link https://swagger.io/specification/v2/
     */
    #[Describe(['nullable'])]
    public ?string $url;
}
