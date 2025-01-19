<?php

namespace Tests\Unit\PathItem;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelSwagger\Parameter;
use Zerotoprod\DataModelSwagger\PathItem;
use Zerotoprod\DataModelSwagger\Reference;

class ParametersTest extends TestCase
{

    #[Test] public function nullable(): void
    {
        $PathItem = PathItem::from();

        self::assertEmpty(
            actual: $PathItem->parameters,
            message: 'A list of parameters that are applicable for this operation.'
        );
    }

    #[Test] public function ref(): void
    {
        $PathItem = PathItem::from([
            PathItem::parameters => [
                [
                    Reference::ref => 'ref'
                ]
            ],
        ]);

        self::assertInstanceOf(
            expected: Reference::class,
            actual: $PathItem->parameters[0],
            message: 'A list of parameters that are applicable for this operation.'
        );

        self::assertEquals(
            expected: 'ref',
            actual: $PathItem->parameters[0]->ref,
            message: 'A list of parameters that are applicable for this operation.'
        );
    }

    #[Test] public function parameter(): void
    {
        $PathItem = PathItem::from([
            PathItem::parameters => [
                [
                    Parameter::type => Parameter::type,
                    Parameter::name => 'name',
                    Parameter::in => 'in',
                ]
            ],
        ]);

        self::assertInstanceOf(
            expected: Parameter::class,
            actual: $PathItem->parameters[0],
            message: 'A list of parameters that are applicable for this operation.'
        );

        self::assertEquals(
            expected: 'name',
            actual: $PathItem->parameters[0]->name,
            message: 'A list of parameters that are applicable for this operation.'
        );
    }
}