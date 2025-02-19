<?php

namespace Zerotoprod\DataModelSwagger;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\DataModelSwagger\Helpers\DataModel;

/**
 * Contact information for the exposed API.
 *
 * @see  https://swagger.io/specification/v2
 * @link https://github.com/zero-to-prod/data-model-swagger
 */
class Contact
{
    use DataModel;

    /**
     * The identifying name of the contact person/organization.
     *
     * @see  https://swagger.io/specification/v2/
     * @see  $name
     * @link https://github.com/zero-to-prod/data-model-swagger
     */
    public const name = 'name';

    /**
     * The identifying name of the contact person/organization.
     *
     * @see  https://swagger.io/specification/v2
     * @link https://github.com/zero-to-prod/data-model-swagger
     */
    #[Describe(['nullable'])]
    public ?string $name;

    /**
     * The URL pointing to the contact information. MUST be in the format of a URL.
     *
     * @see  https://swagger.io/specification/v2/
     * @see  $url
     * @link https://github.com/zero-to-prod/data-model-swagger
     */
    public const url = 'url';

    /**
     * The URL pointing to the contact information. MUST be in the format of a URL.
     *
     * @see  https://swagger.io/specification/v2
     * @link https://github.com/zero-to-prod/data-model-swagger
     */
    #[Describe(['nullable'])]
    public ?string $url;

    /**
     * The email address of the contact person/organization. MUST be in the format of an email address..
     *
     * @see  https://swagger.io/specification/v2/
     * @see  $email
     * @link https://github.com/zero-to-prod/data-model-swagger
     */
    public const email = 'email';

    /**
     * The email address of the contact person/organization. MUST be in the format of an email address.
     *
     * @see  https://swagger.io/specification/v2
     * @link https://github.com/zero-to-prod/data-model-swagger
     */
    #[Describe(['nullable'])]
    public ?string $email;
}
