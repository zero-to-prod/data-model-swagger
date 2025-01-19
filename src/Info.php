<?php

namespace Zerotoprod\DataModelSwagger;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\DataModelSwagger\Helpers\DataModel;

/**
 * The object provides metadata about the API. The metadata can be
 * used by the clients if needed, and can be presented in the
 * Swagger-UI for convenience.
 *
 * @link https://swagger.io/specification/v2/
 */
class Info
{
    use DataModel;

    /**
     * Required. The title of the application.
     *
     * @link https://swagger.io/specification/v2/
     * @see  $title
     */
    public const title = 'title';

    /**
     * Required. The title of the application.
     *
     * @link https://swagger.io/specification/v2/
     */
    #[Describe(['required'])]
    public string $title;

    /**
     * A short description of the application. GFM syntax can be
     * used for rich text representation.
     *
     * @link https://swagger.io/specification/v2/
     * @see  https://guides.github.com/features/mastering-markdown/#-git-hub-flavored-markdown
     * @see  $description
     */
    public const description = 'description';

    /**
     * A short description of the application. GFM syntax can be
     * used for rich text representation.
     *
     * @link https://swagger.io/specification/v2/
     * @see  https://guides.github.com/features/mastering-markdown/#-git-hub-flavored-markdown
     */
    #[Describe(['nullable' => true])]
    public ?string $description;

    /**
     * The Terms of Service for the API.
     *
     * @link https://swagger.io/specification/v2/
     * @see  $termsOfService
     */
    public const termsOfService = 'termsOfService';

    /**
     * The Terms of Service for the API.
     *
     * @link https://swagger.io/specification/v2/
     */
    #[Describe(['nullable'])]
    public ?string $termsOfService;

    /**
     * Required Provides the version of the application API
     * (not to be confused with the specification version).
     *
     * @link https://swagger.io/specification/v2/
     * @see  $version
     */
    public const version = 'version';

    /**
     * Required Provides the version of the application API
     * (not to be confused with the specification version).
     *
     * @link https://swagger.io/specification/v2/
     */
    #[Describe(['required'])]
    public string $version;

    /**
     * The contact information for the exposed API.
     *
     * @link https://swagger.io/specification/v2/
     * @see  $contact
     */
    public const contact = 'contact';

    /**
     * The contact information for the exposed API.
     *
     * @link https://swagger.io/specification/v2/
     */
    #[Describe(['nullable'])]
    public ?Contact $contact;

    /**
     * The license information for the exposed API.
     *
     * @link https://swagger.io/specification/v2/
     * @see  $licence
     */
    public const licence = 'licence';

    /**
     * The license information for the exposed API.
     *
     * @link https://swagger.io/specification/v2/
     */
    #[Describe(['nullable'])]
    public ?License $license;
}
