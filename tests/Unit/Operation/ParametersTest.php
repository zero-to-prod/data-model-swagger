<?php

namespace Tests\Unit\Operation;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelSwagger\Operation;
use Zerotoprod\DataModelSwagger\Parameter;
use Zerotoprod\DataModelSwagger\Reference;

class ParametersTest extends TestCase
{

    #[Test] public function nullable(): void
    {
        $Operation = Operation::from([Operation::responses => ['example1' => [Reference::ref => 'ref']]]);

        self::assertEmpty(
            actual: $Operation->parameters,
            message: 'A list of parameters that are applicable for this operation.'
        );
    }

    #[Test] public function ref(): void
    {
        $Operation = Operation::from([
            Operation::parameters => [
                [
                    Reference::ref => 'ref'
                ]
            ],
            Operation::responses => [
                'example1' => [
                    Reference::ref => 'ref'
                ]
            ]
        ]);

        self::assertInstanceOf(
            expected: Reference::class,
            actual: $Operation->parameters[0],
            message: 'A list of parameters that are applicable for this operation.'
        );

        self::assertEquals(
            expected: 'ref',
            actual: $Operation->parameters[0]->ref,
            message: 'A list of parameters that are applicable for this operation.'
        );
    }

    #[Test] public function parameter(): void
    {
        $Operation = Operation::from([
            Operation::parameters => [
                [
                    Parameter::type => Parameter::type,
                    Parameter::name => 'name',
                    Parameter::in => 'in',
                ]
            ],
            Operation::responses => ['example1' => [Reference::ref => 'ref']]
        ]);

        self::assertInstanceOf(
            expected: Parameter::class,
            actual: $Operation->parameters[0],
            message: 'A list of parameters that are applicable for this operation.'
        );

        self::assertEquals(
            expected: 'name',
            actual: $Operation->parameters[0]->name,
            message: 'A list of parameters that are applicable for this operation.'
        );
    }
}