<?php

namespace Zerotoprod\DataModelSwagger;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\DataModelSwagger\Helpers\DataModel;

/**
 * Contact information for the exposed API.
 *
 * @link https://swagger.io/specification/v2/
 */
class Contact
{
    use DataModel;

    /**
     * The identifying name of the contact person/organization.
     *
     * @link https://swagger.io/specification/v2/
     * @see  $name
     */
    public const name = 'name';

    /**
     * The identifying name of the contact person/organization.
     *
     * @link https://swagger.io/specification/v2/
     */
    #[Describe(['nullable'])]
    public ?string $name;

    /**
     * The URL pointing to the contact information. MUST be in the format of a URL.
     *
     * @link https://swagger.io/specification/v2/
     * @see  $url
     */
    public const url = 'url';

    /**
     * The URL pointing to the contact information. MUST be in the format of a URL.
     *
     * @link https://swagger.io/specification/v2/
     */
    #[Describe(['nullable'])]
    public ?string $url;

    /**
     * The email address of the contact person/organization. MUST be in the format of an email address..
     *
     * @link https://swagger.io/specification/v2/
     * @see  $email
     */
    public const email = 'email';

    /**
     * The email address of the contact person/organization. MUST be in the format of an email address.
     *
     * @link https://swagger.io/specification/v2/
     */
    #[Describe(['nullable'])]
    public ?string $email;
}
