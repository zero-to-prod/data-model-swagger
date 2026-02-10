# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Project Overview

PHP library that maps **Swagger 2.0** specifications into strongly-typed PHP objects using the `Zerotoprod\DataModel` pattern. Entry point: `Swagger::from(json_decode($json, true))`.

## Development Commands

All commands use Docker via the `dock` helper script. PHP version is controlled by `PHP_VERSION` in `.env`.

```bash
sh dock init                          # Create .env from .env.example
sh dock composer update               # Install/update dependencies
sh dock test                          # Run full test suite
sh dock test --filter=ClassName       # Run a single test class
sh dock test --filter=method_name     # Run a single test method
sh test.sh                            # Run tests across all PHP versions (8.1-8.5)
```

## Architecture

### Trait Composition

Every model class uses the `Helpers\DataModel` trait, which combines three traits:
- `Zerotoprod\DataModel\DataModel` — provides `::from(array)` factory method
- `Transformable` — provides `->to(array)` conversion
- `DataModelHelper` — provides `mapOf()` for mapping arrays of nested objects

### Property Declaration Pattern

Properties use `#[Describe]` attributes to control deserialization from JSON:

```php
#[Describe(['required'])]                                    // Field must be present
#[Describe(['nullable'])]                                    // Can be null
#[Describe(['default' => []])]                               // Default when absent
#[Describe(['cast' => [self::class, 'castMethod']])]         // Custom cast function
#[Describe(['from' => '$ref'])]                              // Map from a different JSON key
```

Each class defines `public const` for every JSON key it maps (used as array keys when constructing objects in tests and casts).

### Polymorphic Casting

Some properties accept multiple types (e.g., `Parameter | Reference`). These use static cast methods that check for `$ref`:

```php
public static function parameters($value, array $context): array {
    return array_map(
        static fn($v) => isset($v[Reference::ref]) ? Reference::from($v) : Parameter::from($v),
        $value
    );
}
```

### Class Hierarchy

All classes in `src/` are flat (no inheritance). Each maps directly to a Swagger 2.0 spec object: `Swagger`, `Info`, `Contact`, `License`, `PathItem`, `Operation`, `Parameter`, `Response`, `Header`, `Schema`, `Item`, `Reference`, `Tag`, `ExternalDocumentation`, `Xml`, `SecurityScheme`.

## Testing Conventions

- Tests use `#[Test]` attribute (not `test` prefix)
- Organized by class and property: `tests/Unit/{ClassName}/{PropertyName}Test.php`
- Acceptance tests in `tests/Acceptance/`
- Each test covers a single property scenario (nullable, string value, reference, default, etc.)
- Objects are constructed using `ClassName::from([ClassName::constName => value])`
- PHPUnit is configured strict: warnings, deprecations, and risky tests all cause failures

## Code Conventions

- `declare(strict_types=1)` in every file
- PSR-4 autoloading: `Zerotoprod\DataModelSwagger\` → `src/`
- Constants are camelCase matching JSON keys
- Extensive docblocks with `@see` links to Swagger 2.0 spec sections
- Docblocks are auto-annotated with `@link` to repo homepage via CI workflow on PRs