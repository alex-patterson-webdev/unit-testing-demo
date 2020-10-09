<?php

declare(strict_types=1);

namespace ArpTest\Demo;

use Arp\Demo\Entity\User;
use PHPUnit\Framework\TestCase;

/**
 * @covers \Arp\Demo\Entity\User
 *
 * @author  Alex Patterson <a.patterson@resume-library.com>
 * @package ArpTest\Demo
 */
final class UserTest extends TestCase
{
    /**
     * Assert that the users first name is by default empty
     */
    public function testFirstNameIsEmptyByDefault(): void
    {
        $user = new User();

        $this->assertEmpty($user->getFirstName());
    }

    /**
     * Assert that the users first name is by default
     */
    public function testSetAndGetFirstName(): void
    {
        $user = new User();

        $firstName = 'Fred';
        $user->setFirstName($firstName);

        $this->assertSame($firstName, $user->getFirstName());
    }
}
