<?php

namespace Zerotoprod\DataModelSwagger;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\DataModelSwagger\Helpers\DataModel;

/**
 * The Schema Object allows the definition of input and output data types.
 * These types can be objects, but also primitives and arrays. This object
 * is based on the JSON Schema Specification Draft 4 and uses a predefined
 * subset of it. On top of this subset, there are extensions provided by
 * this specification to allow for more complete documentation.
 *
 * Further information about the properties can be found in JSON Schema Core and
 * JSON Schema Validation. Unless stated otherwise, the property definitions
 * follow the JSON Schema specification as referenced here.
 *
 * @see  https://swagger.io/specification/v2
 * @link https://github.com/zero-to-prod/data-model-swagger
 */
class Schema
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
     * The reference string.
     *
     * @see  https://swagger.io/specification/v2
     * @link https://github.com/zero-to-prod/data-model-swagger
     */
    #[Describe(['nullable', 'from' => self::ref])]
    public null|string $ref;

    /**
     * While relying on JSON Schema’s defined formats, the OAS offers a few
     * additional predefined formats.
     *
     * @see  https://swagger.io/specification/v2/
     * @see  $format
     * @link https://github.com/zero-to-prod/data-model-swagger
     */
    public const format = 'format';

    /**
     * While relying on JSON Schema’s defined formats, the OAS offers a few
     * additional predefined formats.
     *
     * @see  https://swagger.io/specification/v2
     * @link https://github.com/zero-to-prod/data-model-swagger
     */
    #[Describe(['nullable'])]
    public ?string $format;

    /**
     * The value of both of these keywords _MUST_ be a string.
     *
     * Both of these keywords can be used to decorate a user interface with
     * information about the data produced by this user interface.  A title
     * will preferably be short, whereas a description will provide
     * explanation about the purpose of the instance described by this
     * schema.
     *
     * @see  https://swagger.io/specification/v2/
     * @see  https://datatracker.ietf.org/doc/html/draft-wright-json-schema-validation-00#section-6.1
     * @see  $title
     * @link https://github.com/zero-to-prod/data-model-swagger
     */
    public const title = 'title';

    /**
     * The value of both of these keywords _MUST_ be a string.
     *
     * Both of these keywords can be used to decorate a user interface with
     * information about the data produced by this user interface.  A title
     * will preferably be short, whereas a description will provide
     * explanation about the purpose of the instance described by this
     * schema.
     *
     * @see  https://swagger.io/specification/v2/
     * @see  https://datatracker.ietf.org/doc/html/draft-wright-json-schema-validation-00#section-6.1
     * @link https://github.com/zero-to-prod/data-model-swagger
     */
    #[Describe(['nullable'])]
    public ?string $title;

    /**
     * GFM syntax can be used for rich text representation
     *
     * @see  https://swagger.io/specification/v2/
     * @see  https://guides.github.com/features/mastering-markdown/#-git-hub-flavored-markdown
     * @see  $description
     * @link https://github.com/zero-to-prod/data-model-swagger
     */
    public const description = 'description';

    /**
     * GFM syntax can be used for rich text representation
     *
     * @see  https://swagger.io/specification/v2/
     * @see  https://guides.github.com/features/mastering-markdown/#-git-hub-flavored-markdown
     * @link https://github.com/zero-to-prod/data-model-swagger
     */
    #[Describe(['nullable'])]
    public ?string $description;

    /**
     * The default value represents what would be assumed by the consumer of the
     * input as the value of the schema if one is not provided. Unlike JSON
     * Schema, the value _MUST_ conform to the defined type for the Schema
     * Object defined at the same level. For example, if `type` is
     * `"string"`, then `default` can be `"foo"` but cannot be 1.
     *
     * @see  https://swagger.io/specification/v2/
     * @see  $default
     * @link https://github.com/zero-to-prod/data-model-swagger
     */
    public const default = 'default';

    /**
     * The default value represents what would be assumed by the consumer of the
     * input as the value of the schema if one is not provided. Unlike JSON
     * Schema, the value _MUST_ conform to the defined type for the Schema
     * Object defined at the same level. For example, if `type` is
     * `"string"`, then `default` can be `"foo"` but cannot be 1.
     *
     * @see  https://swagger.io/specification/v2
     * @link https://github.com/zero-to-prod/data-model-swagger
     */
    #[Describe(['nullable'])]
    public mixed $default;

    /**
     * The value of "multipleOf" _MUST_ be a number, strictly greater than 0.
     *
     * A numeric instance is only valid if division by this keyword's value
     * results in an integer.
     *
     * @see  https://swagger.io/specification/v2/
     * @see  https://datatracker.ietf.org/doc/html/draft-wright-json-schema-validation-00#section-5.1
     * @see  $multipleOf
     * @link https://github.com/zero-to-prod/data-model-swagger
     */
    public const multipleOf = 'multipleOf';

    /**
     * The value of "multipleOf" _MUST_ be a number, strictly greater than 0.
     *
     * A numeric instance is only valid if division by this keyword's value
     * results in an integer.
     *
     * @see  https://swagger.io/specification/v2/
     * @see  https://datatracker.ietf.org/doc/html/draft-wright-json-schema-validation-00#section-5.1
     * @link https://github.com/zero-to-prod/data-model-swagger
     */
    #[Describe(['nullable'])]
    public null|float|int $multipleOf;

    /**
     * The value of "maximum" _MUST_ be a number, representing an upper limit
     * for a numeric instance.
     *
     * If the instance is a number, then this keyword validates if
     * "exclusiveMaximum" is true and instance is less than the provided
     * value, or else if the instance is less than or exactly equal to the
     * provided value.
     *
     * @see  https://swagger.io/specification/v2/
     * @see  https://datatracker.ietf.org/doc/html/draft-wright-json-schema-validation-00#section-5.2
     * @see  $maximum
     * @link https://github.com/zero-to-prod/data-model-swagger
     */
    public const maximum = 'maximum';

    /**
     * The value of "maximum" _MUST_ be a number, representing an upper limit
     * for a numeric instance.
     *
     * If the instance is a number, then this keyword validates if
     * "exclusiveMaximum" is true and instance is less than the provided
     * value, or else if the instance is less than or exactly equal to the
     * provided value.
     *
     * @see  https://swagger.io/specification/v2/
     * @see  https://datatracker.ietf.org/doc/html/draft-wright-json-schema-validation-00#section-5.2
     * @link https://github.com/zero-to-prod/data-model-swagger
     */
    #[Describe(['nullable'])]
    public null|int|float $maximum;

    /**
     * The value of "exclusiveMaximum" _MUST_ be a boolean, representing
     * whether the limit in "maximum" is exclusive or not.  An undefined
     * value is the same as false.
     *
     * If "exclusiveMaximum" is true, then a numeric instance SHOULD NOT be
     * equal to the value specified in "maximum".  If "exclusiveMaximum" is
     * false (or not specified), then a numeric instance MAY be equal to the
     * value of "maximum".
     *
     * @see  https://swagger.io/specification/v2/
     * @see  https://datatracker.ietf.org/doc/html/draft-wright-json-schema-validation-00#section-5.3
     * @see  $exclusiveMaximum
     * @link https://github.com/zero-to-prod/data-model-swagger
     */
    public const exclusiveMaximum = 'exclusiveMaximum';

    /**
     * The value of "exclusiveMaximum" _MUST_ be a boolean, representing
     * whether the limit in "maximum" is exclusive or not.  An undefined
     * value is the same as false.
     *
     * If "exclusiveMaximum" is true, then a numeric instance SHOULD NOT be
     * equal to the value specified in "maximum".  If "exclusiveMaximum" is
     * false (or not specified), then a numeric instance MAY be equal to the
     * value of "maximum".
     *
     * @see  https://swagger.io/specification/v2/
     * @see  https://datatracker.ietf.org/doc/html/draft-wright-json-schema-validation-00#section-5.3
     * @link https://github.com/zero-to-prod/data-model-swagger
     */
    #[Describe(['default' => false])]
    public bool $exclusiveMaximum;

    /**
     * The value of "minimum" _MUST_ be a number, representing a lower limit
     * for a numeric instance.
     *
     * If the instance is a number, then this keyword validates if
     * "exclusiveMinimum" is true and instance is greater than the provided
     * value, or else if the instance is greater than or exactly equal to
     * the provided value.
     *
     * @see  https://swagger.io/specification/v2/
     * @see  https://datatracker.ietf.org/doc/html/draft-wright-json-schema-validation-00#section-5.4
     * @see  $minimum
     * @link https://github.com/zero-to-prod/data-model-swagger
     */
    public const minimum = 'minimum';

    /**
     * The value of "minimum" _MUST_ be a number, representing a lower limit
     * for a numeric instance.
     *
     * If the instance is a number, then this keyword validates if
     * "exclusiveMinimum" is true and instance is greater than the provided
     * value, or else if the instance is greater than or exactly equal to
     * the provided value.
     *
     * @see  https://swagger.io/specification/v2/
     * @see  https://datatracker.ietf.org/doc/html/draft-wright-json-schema-validation-00#section-5.4
     * @link https://github.com/zero-to-prod/data-model-swagger
     */
    #[Describe(['nullable'])]
    public null|int|float $minimum;

    /**
     * The value of "exclusiveMinimum" _MUST_ be a boolean, representing
     * whether the limit in "minimum" is exclusive or not.  An undefined
     * value is the same as false.
     *
     * If "exclusiveMinimum" is true, then a numeric instance SHOULD NOT be
     * equal to the value specified in "minimum".  If "exclusiveMinimum" is
     * false (or not specified), then a numeric instance MAY be equal to the
     * value of "minimum".
     *
     * @see  https://swagger.io/specification/v2/
     * @see  https://datatracker.ietf.org/doc/html/draft-wright-json-schema-validation-00#section-5.5
     * @see  $exclusiveMinimum
     * @link https://github.com/zero-to-prod/data-model-swagger
     */
    public const exclusiveMinimum = 'exclusiveMinimum';

    /**
     * The value of "exclusiveMinimum" _MUST_ be a boolean, representing
     * whether the limit in "minimum" is exclusive or not.  An undefined
     * value is the same as false.
     *
     * If "exclusiveMinimum" is true, then a numeric instance SHOULD NOT be
     * equal to the value specified in "minimum".  If "exclusiveMinimum" is
     * false (or not specified), then a numeric instance MAY be equal to the
     * value of "minimum".
     *
     * @see  https://swagger.io/specification/v2/
     * @see  https://datatracker.ietf.org/doc/html/draft-wright-json-schema-validation-00#section-5.5
     * @link https://github.com/zero-to-prod/data-model-swagger
     */
    #[Describe(['default' => false])]
    public bool $exclusiveMinimum;

    /**
     * The value of this keyword _MUST_ be a non-negative integer.
     *
     * The value of this keyword _MUST_ be an integer. This integer _MUST_ be
     * greater than, or equal to, 0.
     *
     * A string instance is valid against this keyword if its length is less
     * than, or equal to, the value of this keyword.
     *
     * The length of a string instance is defined as the number of its
     * characters as defined by RFC 7159 [RFC7159].
     *
     * @see  https://swagger.io/specification/v2/
     * @see  https://datatracker.ietf.org/doc/html/draft-wright-json-schema-validation-00#section-5.6
     * @see  $maxLength
     * @link https://github.com/zero-to-prod/data-model-swagger
     */
    public const maxLength = 'maxLength';

    /**
     * The value of this keyword _MUST_ be a non-negative integer.
     *
     * The value of this keyword _MUST_ be an integer. This integer _MUST_ be
     * greater than, or equal to, 0.
     *
     * A string instance is valid against this keyword if its length is less
     * than, or equal to, the value of this keyword.
     *
     * The length of a string instance is defined as the number of its
     * characters as defined by RFC 7159 [RFC7159].
     *
     * @see  https://swagger.io/specification/v2/
     * @see  https://datatracker.ietf.org/doc/html/draft-wright-json-schema-validation-00#section-5.6
     * @link https://github.com/zero-to-prod/data-model-swagger
     */
    #[Describe(['nullable'])]
    public ?int $maxLength;

    /**
     * A string instance is valid against this keyword if its length is
     * greater than, or equal to, the value of this keyword.
     *
     * The length of a string instance is defined as the number of its
     * characters as defined by RFC 7159 [RFC7159].
     *
     * The value of this keyword _MUST_ be an integer.  This integer _MUST_ be
     * greater than, or equal to, 0.
     *
     * "minLength", if absent, may be considered as being present with
     * integer value 0.
     *
     * @see  https://swagger.io/specification/v2/
     * @see  https://datatracker.ietf.org/doc/html/draft-wright-json-schema-validation-00#section-5.7
     * @see  $minLength
     * @link https://github.com/zero-to-prod/data-model-swagger
     */
    public const minLength = 'minLength';

    /**
     * A string instance is valid against this keyword if its length is
     * greater than, or equal to, the value of this keyword.
     *
     * The length of a string instance is defined as the number of its
     * characters as defined by RFC 7159 [RFC7159].
     *
     * The value of this keyword _MUST_ be an integer.  This integer _MUST_ be
     * greater than, or equal to, 0.
     *
     * "minLength", if absent, may be considered as being present with
     * integer value 0.
     *
     * @see  https://swagger.io/specification/v2/
     * @see  https://datatracker.ietf.org/doc/html/draft-wright-json-schema-validation-00#section-5.7
     * @link https://github.com/zero-to-prod/data-model-swagger
     */
    #[Describe(['default' => 0])]
    public int $minLength;

    /**
     * The value of this keyword _MUST_ be a string.  This string SHOULD be a
     * valid regular expression, according to the ECMA 262 regular
     * expression dialect.
     *
     * A string instance is considered valid if the regular expression
     * matches the instance successfully.  Recall: regular expressions are
     * not implicitly anchored.
     *
     * @see  https://swagger.io/specification/v2/
     * @see  https://datatracker.ietf.org/doc/html/draft-wright-json-schema-validation-00#section-5.8
     * @see  $pattern
     * @link https://github.com/zero-to-prod/data-model-swagger
     */
    public const pattern = 'pattern';

    /**
     * A string instance is valid against this keyword if its length is
     * greater than, or equal to, the value of this keyword.
     *
     * The length of a string instance is defined as the number of its
     * characters as defined by RFC 7159 [RFC7159].
     *
     * The value of this keyword _MUST_ be an integer.  This integer _MUST_ be
     * greater than, or equal to, 0.
     *
     * "pattern", if absent, may be considered as being present with
     * integer value 0.
     *
     * @see  https://swagger.io/specification/v2/
     * @see  https://datatracker.ietf.org/doc/html/draft-wright-json-schema-validation-00#section-5.7
     * @link https://github.com/zero-to-prod/data-model-swagger
     */
    #[Describe(['default' => 0])]
    public int|string $pattern;

    /**
     * The value of this keyword _MUST_ be an integer.  This integer _MUST_ be
     * greater than, or equal to, 0.
     *
     * An array instance is valid against "maxItems" if its size is less
     * than, or equal to, the value of this keyword.
     *
     * @see  https://swagger.io/specification/v2/
     * @see  https://datatracker.ietf.org/doc/html/draft-wright-json-schema-validation-00#section-5.10
     * @see  $maxItems
     * @link https://github.com/zero-to-prod/data-model-swagger
     */
    public const maxItems = 'maxItems';

    /**
     * The value of this keyword _MUST_ be an integer.  This integer _MUST_ be
     * greater than, or equal to, 0.
     *
     * An array instance is valid against "maxItems" if its size is less
     * than, or equal to, the value of this keyword.
     *
     * @see  https://swagger.io/specification/v2/
     * @see  https://datatracker.ietf.org/doc/html/draft-wright-json-schema-validation-00#section-5.10
     * @link https://github.com/zero-to-prod/data-model-swagger
     */
    #[Describe(['nullable'])]
    public ?int $maxItems;

    /**
     * The value of this keyword _MUST_ be an integer.  This integer _MUST_ be
     * greater than, or equal to, 0.
     *
     * An array instance is valid against "minItems" if its size is greater
     * than, or equal to, the value of this keyword.
     *
     * If this keyword is not present, it may be considered present with a
     * value of 0.
     *
     * @see  https://swagger.io/specification/v2/
     * @see  https://datatracker.ietf.org/doc/html/draft-wright-json-schema-validation-00#section-5.11
     * @see  $minItems
     * @link https://github.com/zero-to-prod/data-model-swagger
     */
    public const minItems = 'minItems';

    /**
     * The value of this keyword _MUST_ be an integer.  This integer _MUST_ be
     * greater than, or equal to, 0.
     *
     * An array instance is valid against "minItems" if its size is greater
     * than, or equal to, the value of this keyword.
     *
     * If this keyword is not present, it may be considered present with a
     * value of 0.
     *
     * @see  https://swagger.io/specification/v2/
     * @see  https://datatracker.ietf.org/doc/html/draft-wright-json-schema-validation-00#section-5.11
     * @link https://github.com/zero-to-prod/data-model-swagger
     */
    #[Describe(['default' => 0])]
    public int $minItems;

    /**
     * The value of this keyword _MUST_ be a boolean.
     *
     * If this keyword has boolean value false, the instance validates
     * successfully.  If it has boolean value true, the instance validates
     * successfully if all of its elements are unique.
     *
     * If not present, this keyword may be considered present with boolean
     * value false.
     *
     * @see  https://swagger.io/specification/v2/
     * @see  https://datatracker.ietf.org/doc/html/draft-wright-json-schema-validation-00#section-5.12
     * @see  $uniqueItems
     * @link https://github.com/zero-to-prod/data-model-swagger
     */
    public const uniqueItems = 'uniqueItems';

    /**
     * The value of this keyword _MUST_ be an integer.  This integer _MUST_ be
     * greater than, or equal to, 0.
     *
     * An object instance is valid against "maxProperties" if its number of
     * properties is less than, or equal to, the value of this keyword.
     *
     * @see  https://swagger.io/specification/v2/
     * @see  https://datatracker.ietf.org/doc/html/draft-wright-json-schema-validation-00#section-5.13
     * @link https://github.com/zero-to-prod/data-model-swagger
     */
    #[Describe(['default' => false])]
    public bool $uniqueItems;

    /**
     * The value of this keyword _MUST_ be an integer.  This integer _MUST_ be
     * greater than, or equal to, 0.
     *
     * An object instance is valid against "maxProperties" if its number of
     * properties is less than, or equal to, the value of this keyword.
     *
     * @see  https://swagger.io/specification/v2/
     * @see  https://datatracker.ietf.org/doc/html/draft-wright-json-schema-validation-00#section-5.13
     * @see  $maxProperties
     * @link https://github.com/zero-to-prod/data-model-swagger
     */
    public const maxProperties = 'maxProperties';

    /**
     * The value of this keyword MUST be an integer.  This integer MUST be
     * greater than, or equal to, 0.
     *
     * An object instance is valid against "maxProperties" if its number of
     * properties is less than, or equal to, the value of this keyword.
     *
     * @see  https://swagger.io/specification/v2/
     * @see  https://datatracker.ietf.org/doc/html/draft-wright-json-schema-validation-00#section-5.13
     * @link https://github.com/zero-to-prod/data-model-swagger
     */
    #[Describe(['nullable'])]
    public ?int $maxProperties;

    /**
     * The value of this keyword _MUST_ be an integer.  This integer _MUST_ be
     * greater than, or equal to, 0.
     *
     * An object instance is valid against "minProperties" if its number of
     * properties is greater than, or equal to, the value of this keyword.
     *
     * If this keyword is not present, it may be considered present with a
     * value of 0.
     *
     * @see  https://swagger.io/specification/v2/
     * @see  https://datatracker.ietf.org/doc/html/draft-wright-json-schema-validation-00#section-5.14
     * @see  $minProperties
     * @link https://github.com/zero-to-prod/data-model-swagger
     */
    public const minProperties = 'minProperties';

    /**
     * The value of this keyword _MUST_ be an integer.  This integer _MUST_ be
     * greater than, or equal to, 0.
     *
     * An object instance is valid against "minProperties" if its number of
     * properties is greater than, or equal to, the value of this keyword.
     *
     * If this keyword is not present, it may be considered present with a
     * value of 0.
     *
     * @see  https://swagger.io/specification/v2/
     * @see  https://datatracker.ietf.org/doc/html/draft-wright-json-schema-validation-00#section-5.14
     * @link https://github.com/zero-to-prod/data-model-swagger
     */
    #[Describe(['default' => 0])]
    public int $minProperties;

    /**
     * The value of this keyword _MUST_ be an array.  This array _MUST_ have at
     * least one element.  Elements of this array MUST be strings, and _MUST_
     * be unique.
     *
     * An object instance is valid against this keyword if its property set
     * contains all elements in this keyword's array value.
     *
     * @see  https://swagger.io/specification/v2/
     * @see  https://datatracker.ietf.org/doc/html/draft-wright-json-schema-validation-00#section-5.15
     * @see  $required
     * @link https://github.com/zero-to-prod/data-model-swagger
     */
    public const required = 'required';

    /**
     * The value of this keyword _MUST_ be an array.  This array _MUST_ have at
     * least one element.  Elements of this array MUST be strings, and _MUST_
     * be unique.
     *
     * An object instance is valid against this keyword if its property set
     * contains all elements in this keyword's array value.
     *
     * @see  https://swagger.io/specification/v2/
     * @see  https://datatracker.ietf.org/doc/html/draft-wright-json-schema-validation-00#section-5.15
     * @link https://github.com/zero-to-prod/data-model-swagger
     */
    #[Describe(['default' => []])]
    public array $required;

    /**
     * The value of this keyword _MUST_ be an array.  This array _SHOULD_ have
     * at least one element.  Elements in the array _SHOULD_ be unique.
     *
     * Elements in the array _MAY_ be of any type, including null.
     *
     * An instance validates successfully against this keyword if its value
     * is equal to one of the elements in this keyword's array value.
     *
     * @see  https://swagger.io/specification/v2/
     * @see  https://datatracker.ietf.org/doc/html/draft-wright-json-schema-validation-00#section-5.20
     * @see  $enum
     * @link https://github.com/zero-to-prod/data-model-swagger
     */
    public const enum = 'enum';

    /**
     * The value of this keyword _MUST_ be an array.  This array _SHOULD_ have
     * at least one element.  Elements in the array _SHOULD_ be unique.
     *
     * Elements in the array _MAY_ be of any type, including null.
     *
     * An instance validates successfully against this keyword if its value
     * is equal to one of the elements in this keyword's array value.
     *
     * @see  https://swagger.io/specification/v2/
     * @see  https://datatracker.ietf.org/doc/html/draft-wright-json-schema-validation-00#section-5.20
     * @link https://github.com/zero-to-prod/data-model-swagger
     */
    #[Describe(['default' => []])]
    public array $enum;

    /**
     * Value _MUST_ be a string. Multiple types via an array are not supported
     *
     * @see  https://swagger.io/specification/v2/
     * @see  $type
     * @link https://github.com/zero-to-prod/data-model-swagger
     */
    public const type = 'type';

    /**
     * Value _MUST_ be a string. Multiple types via an array are not supported
     *
     * @see  https://swagger.io/specification/v2
     * @link https://github.com/zero-to-prod/data-model-swagger
     */
    #[Describe(['nullable'])]
    public ?string $type;

    /**
     * Value _MUST_ be an object and not an array. Inline or referenced
     * schema _MUST_ be of a Schema Object and not a standard JSON Schema.
     * `items` _MUST_ be present if type is "array".
     *
     * @see  https://swagger.io/specification/v2/
     * @see  $items
     * @link https://github.com/zero-to-prod/data-model-swagger
     */
    public const items = 'items';

    /**
     * Value _MUST_ be an object and not an array. Inline or referenced
     * schema _MUST_ be of a Schema Object and not a standard JSON Schema.
     * `items` _MUST_ be present if type is "array".
     *
     * @see  https://swagger.io/specification/v2
     * @link https://github.com/zero-to-prod/data-model-swagger
     */
    #[Describe(['cast' => [self::class, 'items']])]
    public null|self $items;

    /**
     * Value _MUST_ be an object and not an array. Inline or referenced
     * schema _MUST_ be of a Schema Object and not a standard JSON Schema.
     * `items` _MUST_ be present if type is "array".
     *
     * @see  https://swagger.io/specification/v2/
     * @see  $items
     * @link https://github.com/zero-to-prod/data-model-swagger
     */
    public static function items($value, array $context): Schema|Reference|null
    {
        if (!isset($context[self::items])) {
            return null;
        }

        return self::from($value);
    }

    /**
     * Inline or referenced schema _MUST_ be of a Schema Object and not a standard JSON Schema.
     *
     * @see  https://swagger.io/specification/v2/
     * @see  $allOf
     * @link https://github.com/zero-to-prod/data-model-swagger
     */
    public const allOf = 'allOf';

    /**
     * Inline or referenced schema _MUST_ be of a Schema Object and not a standard JSON Schema.
     *
     * @var array<int, self> $allOf
     *
     * @see  https://swagger.io/specification/v2
     * @link https://github.com/zero-to-prod/data-model-swagger
     */
    #[Describe(['cast' => [self::class, 'allOf']])]
    public array $allOf;

    /**
     * Inline or referenced schema _MUST_ be of a Schema Object and not a standard JSON Schema.
     *
     * @see  https://swagger.io/specification/v2/
     * @see  $allOf
     * @link https://github.com/zero-to-prod/data-model-swagger
     */
    public static function allOf($value, array $context): array
    {
        return isset($context[self::allOf])
            ? array_map(
                static fn($value) => self::from($value),
                $value
            )
            : [];
    }

    /**
     * Property definitions _MUST_ be a Schema Object and not a standard
     * JSON Schema (inline or referenced).
     *
     * @see  https://swagger.io/specification/v2/
     * @see  $properties
     * @link https://github.com/zero-to-prod/data-model-swagger
     */
    public const properties = 'properties';

    /**
     * Property definitions _MUST_ be a Schema Object and not a standard
     * JSON Schema (inline or referenced).
     *
     * @var ?self[]
     *
     * @see  https://swagger.io/specification/v2
     * @link https://github.com/zero-to-prod/data-model-swagger
     */
    #[Describe(['cast' => [self::class, 'properties']])]
    public array|Schema $properties;

    /**
     * Property definitions _MUST_ be a Schema Object and not a standard
     * JSON Schema (inline or referenced).
     *
     * @see  https://swagger.io/specification/v2/
     * @see  $properties
     * @link https://github.com/zero-to-prod/data-model-swagger
     */
    public static function properties($value, array $context): Schema|array|null
    {
        return isset($context[self::properties])
            ? array_map(
                static fn($value) => self::from($value),
                $value
            )
            : [];
    }

    /**
     * Value can be boolean or object. Inline or referenced schema _MUST_ be of a
     * Schema Object and not a standard JSON Schema. Consistent with JSON
     * Schema, `additionalProperties` defaults to `true`.
     *
     * @see  https://swagger.io/specification/v2/
     * @see  $additionalProperties
     * @link https://github.com/zero-to-prod/data-model-swagger
     */
    public const additionalProperties = 'additionalProperties';

    /**
     * Value can be boolean or object. Inline or referenced schema _MUST_ be of a
     * Schema Object and not a standard JSON Schema. Consistent with JSON
     * Schema, `additionalProperties` defaults to `true`.
     *
     * @see  https://swagger.io/specification/v2
     * @link https://github.com/zero-to-prod/data-model-swagger
     */
    #[Describe(['cast' => [self::class, 'additionalProperties']])]
    public bool|self $additionalProperties;

    /**
     * Value can be boolean or object. Inline or referenced schema _MUST_ be of a
     * Schema Object and not a standard JSON Schema. Consistent with JSON
     * Schema, `additionalProperties` defaults to `true`.
     *
     * @see  https://swagger.io/specification/v2/
     * @see  $additionalProperties
     * @link https://github.com/zero-to-prod/data-model-swagger
     */
    public static function additionalProperties($value, array $context): Schema|bool
    {
        if (!isset($context[self::additionalProperties])) {
            return false;
        }

        if (is_bool($value)) {
            return $value;
        }

        return self::from($value);
    }

    /**
     * Adds support for polymorphism. The discriminator is the schema property
     * name that is used to differentiate between other schema that inherit
     * this schema. The property name used MUST be defined at this schema
     * and it MUST be in the required property list. When used, the value
     * MUST be the name of this schema or any schema that inherits it.
     *
     * @see  https://swagger.io/specification/v2/
     * @see  $discriminator
     * @link https://github.com/zero-to-prod/data-model-swagger
     */
    public const discriminator = 'discriminator';

    /**
     * Adds support for polymorphism. The discriminator is the schema property
     * name that is used to differentiate between other schema that inherit
     * this schema. The property name used MUST be defined at this schema
     * and it MUST be in the required property list. When used, the value
     * MUST be the name of this schema or any schema that inherits it.
     *
     * @see  https://swagger.io/specification/v2
     * @link https://github.com/zero-to-prod/data-model-swagger
     */
    #[Describe(['nullable'])]
    public ?string $discriminator;

    /**
     * Relevant only for Schema Object `properties` definitions. Declares the
     * property as “read only”. This means that it _MAY_ be sent as part
     * of a response but _SHOULD_NOT_ be sent as part of the request.
     * If the property is marked as `readOnly` being `true` and is in
     * the `required` list, the `required` will take effect on the
     * response only. A property _MUST NOT_ be marked as both
     * `readOnly` and `writeOnly` being `true`. Default value
     * is `false`.
     *
     * @see  https://swagger.io/specification/v2/
     * @see  $readOnly
     * @link https://github.com/zero-to-prod/data-model-swagger
     */
    public const readOnly = 'readOnly';

    /**
     * Relevant only for Schema Object `properties` definitions. Declares the
     * property as “read only”. This means that it _MAY_ be sent as part
     * of a response but _SHOULD_NOT_ be sent as part of the request.
     * If the property is marked as `readOnly` being `true` and is in
     * the `required` list, the `required` will take effect on the
     * response only. A property _MUST NOT_ be marked as both
     * `readOnly` and `writeOnly` being `true`. Default value
     * is `false`.
     *
     * @see  https://swagger.io/specification/v2
     * @link https://github.com/zero-to-prod/data-model-swagger
     */
    #[Describe(['default' => false])]
    public bool $readOnly;

    /**
     * This _MAY_ be used only on property schemas. It has no effect on
     * root schemas. Adds additional metadata to describe the XML
     * representation of this property.
     *
     * @see  https://swagger.io/specification/v2/
     * @see  $xml
     * @link https://github.com/zero-to-prod/data-model-swagger
     */
    public const xml = 'xml';

    /**
     * This _MAY_ be used only on property schemas. It has no effect on
     * root schemas. Adds additional metadata to describe the XML
     * representation of this property.
     *
     * @see  https://swagger.io/specification/v2
     * @link https://github.com/zero-to-prod/data-model-swagger
     */
    #[Describe(['nullable'])]
    public ?Xml $xml;

    /**
     * Additional external documentation for this schema.
     *
     * @see  https://swagger.io/specification/v2/
     * @see  $externalDocs
     * @link https://github.com/zero-to-prod/data-model-swagger
     */
    public const externalDocs = 'externalDocs';

    /**
     * Additional external documentation for this schema.
     *
     * @see  https://swagger.io/specification/v2
     * @link https://github.com/zero-to-prod/data-model-swagger
     */
    #[Describe(['nullable'])]
    public ?ExternalDocumentation $externalDocs;

    /**
     * A free-form field to include an example of an instance for this schema.
     * To represent examples that cannot be naturally represented in JSON or
     * YAML, a string value can be used to contain the example with escaping
     * where necessary.
     *
     * @see  https://swagger.io/specification/v2/
     * @see  $example
     * @link https://github.com/zero-to-prod/data-model-swagger
     */
    public const example = 'example';

    /**
     * A free-form field to include an example of an instance for this schema.
     * To represent examples that cannot be naturally represented in JSON or
     * YAML, a string value can be used to contain the example with escaping
     * where necessary.
     *
     * @see  https://swagger.io/specification/v2
     * @link https://github.com/zero-to-prod/data-model-swagger
     */
    #[Describe(['nullable'])]
    public mixed $example;
}
