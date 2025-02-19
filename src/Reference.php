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
 * @see  https://swagger.io/specification/v2
 * @link https://github.com/zero-to-prod/data-model-swagger
 */
class Reference
{
    use DataModel;

    /**
     * **REQUIRED**. The reference string.
     *
     * @see  https://swagger.io/specification/v2/
     * @see  $ref
     * @link https://github.com/zero-to-prod/data-model-swagger
     */
    public const ref = '$ref';

    /**
     * **REQUIRED**. The reference string.
     *
     * @see  https://swagger.io/specification/v2
     * @link https://github.com/zero-to-prod/data-model-swagger
     */
    #[Describe(['cast' => [self::class, 'ref']])]
    public string $ref;

    /**
     * **REQUIRED**. The reference string.
     *
     * @see  https://swagger.io/specification/v2/
     * @see  $ref
     * @link https://github.com/zero-to-prod/data-model-swagger
     */
    public static function ref($value, $context)
    {
        if (isset($context['$ref'])) {
            return $context['$ref'];
        }
        throw new PropertyRequiredException('Property `$ref` is required.');
    }
}
