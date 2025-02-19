<?php

namespace Zerotoprod\DataModelSwagger;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\DataModelSwagger\Helpers\DataModel;

/**
 * License information for the exposed API.
 *
 * @see  https://swagger.io/specification/v2
 * @link https://github.com/zero-to-prod/data-model-swagger
 */
class License
{
    use DataModel;

    /**
     * **REQUIRED**. The license name used for the API.
     *
     * @see  https://swagger.io/specification/v2/
     * @see  $name
     * @link https://github.com/zero-to-prod/data-model-swagger
     */
    public const name = 'name';

    /**
     * **REQUIRED**. The license name used for the API.
     *
     * @see  https://swagger.io/specification/v2
     * @link https://github.com/zero-to-prod/data-model-swagger
     */
    #[Describe(['required'])]
    public string $name;

    /**
     * A URL for the license used for the API. This _MUST_ be in the form of a URL.
     *
     * @see  https://swagger.io/specification/v2/
     * @see  $url
     * @link https://github.com/zero-to-prod/data-model-swagger
     */
    public const url = 'url';

    /**
     * A URL for the license used for the API. This _MUST_ be in the form of a URL.
     *
     * @see  https://swagger.io/specification/v2
     * @link https://github.com/zero-to-prod/data-model-swagger
     */
    #[Describe(['nullable'])]
    public ?string $url;
}
