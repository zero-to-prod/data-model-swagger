<?php

namespace Zerotoprod\DataModelSwagger;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\DataModelSwagger\Helpers\DataModel;

/**
 * Describes a single operation parameter.
 *
 * A unique parameter is defined by a combination of a name and location.
 *
 * @see  https://swagger.io/specification/v2
 * @link https://github.com/zero-to-prod/data-model-swagger
 */
class Parameter
{
    use DataModel;

    /**
     * Required. The name of the parameter. Parameter names are case sensitive.
     *
     * If in is "path", the name field MUST correspond to the associated path segment from
     * the path field in the Paths Object. See Path Templating for further information.
     *
     * For all other cases, the name corresponds to the parameter name used based on the in property.
     *
     * @see  https://swagger.io/specification/v2/
     * @see  $name
     * @link https://github.com/zero-to-prod/data-model-swagger
     */
    public const name = 'name';

    /**
     * Required. The name of the parameter. Parameter names are case sensitive.
     *
     * If in is "path", the name field MUST correspond to the associated path segment from
     * the path field in the Paths Object. See Path Templating for further information.
     *
     * For all other cases, the name corresponds to the parameter name used based on the in property.
     *
     * @see  https://swagger.io/specification/v2
     * @link https://github.com/zero-to-prod/data-model-swagger
     */
    #[Describe(['required'])]
    public string $name;

    /**
     * **REQUIRED**. The location of the parameter. Possible values are
     * "query", "header", "path", "formData" or "body".
     *
     * @see  https://swagger.io/specification/v2/
     * @see  $in
     * @link https://github.com/zero-to-prod/data-model-swagger
     */
    public const in = 'in';

    /**
     * **REQUIRED**. The location of the parameter. Possible values are
     * "query", "header", "path", "formData" or "body".
     *
     * @see  https://swagger.io/specification/v2
     * @link https://github.com/zero-to-prod/data-model-swagger
     */
    #[Describe(['required'])]
    public string $in;

    /**
     * A brief description of the parameter. This could contain examples
     * of use. GFM syntax can be used for rich text representation.
     *
     * @see  https://swagger.io/specification/v2/
     * @see  https://guides.github.com/features/mastering-markdown/#-git-hub-flavored-markdown
     * @see  $description
     * @link https://github.com/zero-to-prod/data-model-swagger
     */
    public const description = 'description';

    /**
     * A brief description of the parameter. This could contain examples
     * of use. GFM syntax can be used for rich text representation.
     *
     * @see  https://swagger.io/specification/v2/
     * @see  https://guides.github.com/features/mastering-markdown/#-git-hub-flavored-markdown
     * @link https://github.com/zero-to-prod/data-model-swagger
     */
    #[Describe(['nullable'])]
    public ?string $description;

    /**
     * Determines whether this parameter is mandatory. If the parameter is in "path", this
     * property is required and its value MUST be true. Otherwise, the property MAY be
     * included and its default value is false.
     *
     * @see  https://swagger.io/specification/v2/
     * @see  $required
     * @link https://github.com/zero-to-prod/data-model-swagger
     */
    public const required = 'required';

    /**
     * Determines whether this parameter is mandatory. If the parameter is in "path", this
     * property is required and its value MUST be true. Otherwise, the property MAY be
     * included and its default value is false.
     *
     * @see  https://swagger.io/specification/v2/
     * @see  $required
     * @link https://github.com/zero-to-prod/data-model-swagger
     */
    #[Describe(['default' => false])]
    public bool $required;

    /**
     * The schema defining the type used for the parameter.
     *
     * @see  https://swagger.io/specification/v2/
     * @see  $schema
     * @link https://github.com/zero-to-prod/data-model-swagger
     */
    public const schema = 'schema';

    /**
     * The schema defining the type used for the parameter.
     *
     * @see  https://swagger.io/specification/v2
     * @link https://github.com/zero-to-prod/data-model-swagger
     */
    #[Describe(['cast' => [self::class, 'schema']])]
    public null|Schema $schema;

    /**
     * The schema defining the type used for the parameter.
     *
     * @see  https://swagger.io/specification/v2/
     * @see  $schema
     * @link https://github.com/zero-to-prod/data-model-swagger
     */
    public static function schema($value, array $context): Schema|null
    {
        if (!isset($context[self::schema])) {
            return null;
        }

        return Schema::from($value);
    }

    /**
     * Required. The type of the parameter. Since the parameter is not located at
     * the request body, it is limited to simple types (that is, not an object).
     * The value MUST be one of "string", "number", "integer", "boolean",
     * "array" or "file". If type is "file", the consumes MUST be either
     * "multipart/form-data", " application/x-www-form-urlencoded" or
     * both and the parameter MUST be in "formData".
     *
     * @see  https://swagger.io/specification/v2/
     * @see  $type
     * @link https://github.com/zero-to-prod/data-model-swagger
     */
    public const type = 'type';

    /**
     * Required. The type of the parameter. Since the parameter is not located at
     * the request body, it is limited to simple types (that is, not an object).
     * The value MUST be one of "string", "number", "integer", "boolean",
     * "array" or "file". If type is "file", the consumes MUST be either
     * "multipart/form-data", " application/x-www-form-urlencoded" or
     * both and the parameter MUST be in "formData".
     *
     * @see  https://swagger.io/specification/v2
     * @link https://github.com/zero-to-prod/data-model-swagger
     */
    #[Describe(['nullable'])]
    public ?string $type;

    /**
     * The extending format for the previously mentioned type. See Data Type
     * Formats for further details.
     *
     * @see  https://swagger.io/specification/v2/
     * @see  $format
     * @link https://github.com/zero-to-prod/data-model-swagger
     */
    public const format = 'format';

    /**
     * The extending format for the previously mentioned type. See Data Type
     * Formats for further details.
     *
     * @see  https://swagger.io/specification/v2
     * @link https://github.com/zero-to-prod/data-model-swagger
     */
    #[Describe(['nullable'])]
    public ?string $format;

    /**
     * Sets the ability to pass empty-valued parameters. This is valid only
     * for either query or formData parameters and allows you to send a
     * parameter with a name only or an empty value. Default value is
     * false.
     *
     * @see  https://swagger.io/specification/v2/
     * @see  $allowEmptyValue
     * @link https://github.com/zero-to-prod/data-model-swagger
     */
    public const allowEmptyValue = 'allowEmptyValue';

    /**
     * Sets the ability to pass empty-valued parameters. This is valid only
     * for either query or formData parameters and allows you to send a
     * parameter with a name only or an empty value. Default value is
     * false.
     *
     * @see  https://swagger.io/specification/v2
     * @link https://github.com/zero-to-prod/data-model-swagger
     */
    #[Describe(['default' => false])]
    public bool $allowEmptyValue;

    /**
     * Required if type is "array". Describes the type of items in the array..
     *
     * @see  https://swagger.io/specification/v2/
     * @see  $items
     * @link https://github.com/zero-to-prod/data-model-swagger
     */
    public const items = 'items';

    /**
     * Required if type is "array". Describes the type of items in the array.
     *
     * @see  https://swagger.io/specification/v2
     * @link https://github.com/zero-to-prod/data-model-swagger
     */
    #[Describe(['nullable'])]
    public ?Item $items;

    /**
     * Determines the format of the array if type array is used. Possible values are:
     * - csv - comma separated values foo,bar.
     * - ssv - space separated values foo bar.
     * - tsv - tab separated values foo\tbar.
     * - pipes - pipe separated values foo|bar.
     *
     * Default value is csv.
     *
     * @see  https://swagger.io/specification/v2/
     * @see  $collectionFormat
     * @link https://github.com/zero-to-prod/data-model-swagger
     */
    public const collectionFormat = 'collectionFormat';

    /**
     * Determines the format of the array if type array is used. Possible values are:
     * - csv - comma separated values foo,bar.
     * - ssv - space separated values foo bar.
     * - tsv - tab separated values foo\tbar.
     * - pipes - pipe separated values foo|bar.
     *
     * Default value is csv.
     *
     * @see  https://swagger.io/specification/v2
     * @link https://github.com/zero-to-prod/data-model-swagger
     */
    #[Describe(['default' => 'csv'])]
    public ?string $collectionFormat;

    /**
     * Declares the value of the item that the server will use if none is provided.
     * (Note: "default" has no meaning for required items.) See
     * https://tools.ietf.org/html/draft-fge-json-schema-validation-00#section-6.2.
     * Unlike JSON Schema this value MUST conform to the defined type for the data type.
     *
     * @see  https://swagger.io/specification/v2/
     * @see  $default
     * @link https://github.com/zero-to-prod/data-model-swagger
     */
    public const default = 'default';

    /**
     * Declares the value of the item that the server will use if none is provided.
     * (Note: "default" has no meaning for required items.) See
     * https://tools.ietf.org/html/draft-fge-json-schema-validation-00#section-6.2.
     * Unlike JSON Schema this value MUST conform to the defined type for the data type.
     *
     * @see  https://swagger.io/specification/v2
     * @link https://github.com/zero-to-prod/data-model-swagger
     */
    #[Describe(['nullable'])]
    public mixed $default;

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
}
