<?php

namespace Tests\Unit\Contact;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelSwagger\Contact;

class EmailTest extends TestCase
{
    #[Test] public function missing_email(): void
    {
        $Contact = Contact::from();

        self::assertNull(
            actual: $Contact->email,
            message: 'The email address of the contact person/organization. '
        );
    }

    #[Test] public function email_field(): void
    {
        $Contact = Contact::from([
            Contact::email => 'jane@example.com',
        ]);

        self::assertEquals(
            expected: 'jane@example.com',
            actual: $Contact->email,
            message: 'The email address of the contact person/organization.'
        );
    }
}