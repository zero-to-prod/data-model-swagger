<?php

namespace Zerotoprod\DataModelSwagger;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\DataModel\PropertyRequiredException;
use Zerotoprod\DataModelSwagger\Helpers\DataModel;

/**
 * A simple object to allow referencing other definitions in the specification.
 * It can be used to reference parameters and responses that are defined at the
 * top level for reuse.
 *
 * The Reference Object is a JSON Reference that uses a JSON Pointer as its value.
 * For this specification, only canonical dereferencing is supported.
 *
 * @link https://swagger.io/specification/v2/
 */
class Reference
{
    use DataModel;

    /**
     * **REQUIRED**. The reference string.
     *
     * @link https://swagger.io/specification/v2/
     * @see  $ref
     */
    public const ref = '$ref';

    /**
     * **REQUIRED**. The reference string.
     *
     * @link https://swagger.io/specification/v2/
     */
    #[Describe(['cast' => [self::class, 'ref']])]
    public string $ref;

    /**
     * **REQUIRED**. The reference string.
     *
     * @link https://swagger.io/specification/v2/
     * @see  $ref
     */
    public static function ref($value, $context)
    {
        if (isset($context['$ref'])) {
            return $context['$ref'];
        }
        throw new PropertyRequiredException('Property `$ref` is required.');
    }
}
