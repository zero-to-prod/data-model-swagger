<?php

namespace Zerotoprod\DataModelSwagger;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\DataModelSwagger\Helpers\DataModel;

/**
 * The object provides metadata about the API. The metadata can be
 * used by the clients if needed, and can be presented in the
 * Swagger-UI for convenience.
 *
 * @see  https://swagger.io/specification/v2
 * @link https://github.com/zero-to-prod/data-model-swagger
 */
class Info
{
    use DataModel;

    /**
     * Required. The title of the application.
     *
     * @see  https://swagger.io/specification/v2/
     * @see  $title
     * @link https://github.com/zero-to-prod/data-model-swagger
     */
    public const title = 'title';

    /**
     * Required. The title of the application.
     *
     * @see  https://swagger.io/specification/v2
     * @link https://github.com/zero-to-prod/data-model-swagger
     */
    #[Describe(['required'])]
    public string $title;

    /**
     * A short description of the application. GFM syntax can be
     * used for rich text representation.
     *
     * @see  https://swagger.io/specification/v2/
     * @see  https://guides.github.com/features/mastering-markdown/#-git-hub-flavored-markdown
     * @see  $description
     * @link https://github.com/zero-to-prod/data-model-swagger
     */
    public const description = 'description';

    /**
     * A short description of the application. GFM syntax can be
     * used for rich text representation.
     *
     * @see  https://swagger.io/specification/v2/
     * @see  https://guides.github.com/features/mastering-markdown/#-git-hub-flavored-markdown
     * @link https://github.com/zero-to-prod/data-model-swagger
     */
    #[Describe(['nullable' => true])]
    public ?string $description;

    /**
     * The Terms of Service for the API.
     *
     * @see  https://swagger.io/specification/v2/
     * @see  $termsOfService
     * @link https://github.com/zero-to-prod/data-model-swagger
     */
    public const termsOfService = 'termsOfService';

    /**
     * The Terms of Service for the API.
     *
     * @see  https://swagger.io/specification/v2
     * @link https://github.com/zero-to-prod/data-model-swagger
     */
    #[Describe(['nullable'])]
    public ?string $termsOfService;

    /**
     * Required Provides the version of the application API
     * (not to be confused with the specification version).
     *
     * @see  https://swagger.io/specification/v2/
     * @see  $version
     * @link https://github.com/zero-to-prod/data-model-swagger
     */
    public const version = 'version';

    /**
     * Required Provides the version of the application API
     * (not to be confused with the specification version).
     *
     * @see  https://swagger.io/specification/v2
     * @link https://github.com/zero-to-prod/data-model-swagger
     */
    #[Describe(['required'])]
    public string $version;

    /**
     * The contact information for the exposed API.
     *
     * @see  https://swagger.io/specification/v2/
     * @see  $contact
     * @link https://github.com/zero-to-prod/data-model-swagger
     */
    public const contact = 'contact';

    /**
     * The contact information for the exposed API.
     *
     * @see  https://swagger.io/specification/v2
     * @link https://github.com/zero-to-prod/data-model-swagger
     */
    #[Describe(['nullable'])]
    public ?Contact $contact;

    /**
     * The license information for the exposed API.
     *
     * @see  https://swagger.io/specification/v2/
     * @see  $licence
     * @link https://github.com/zero-to-prod/data-model-swagger
     */
    public const licence = 'licence';

    /**
     * The license information for the exposed API.
     *
     * @see  https://swagger.io/specification/v2
     * @link https://github.com/zero-to-prod/data-model-swagger
     */
    #[Describe(['nullable'])]
    public ?License $license;
}
