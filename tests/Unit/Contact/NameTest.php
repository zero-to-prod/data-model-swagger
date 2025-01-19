<?php

namespace Tests\Unit\Contact;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelSwagger\Contact;

class NameTest extends TestCase
{
    #[Test] public function missing_name(): void
    {
        $Contact = Contact::from();

        self::assertNull(
            actual: $Contact->name,
            message: 'The identifying name of the contact person/organization.'
        );
    }

    #[Test] public function name_field(): void
    {
        $Contact = Contact::from([
            Contact::name => 'name'
        ]);

        self::assertEquals(
            expected: 'name',
            actual: $Contact->name,
            message: 'The identifying name of the contact person/organization.'
        );
    }
}