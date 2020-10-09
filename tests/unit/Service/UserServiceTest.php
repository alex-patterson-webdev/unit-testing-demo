<?php

declare(strict_types=1);

namespace ArpTest\Demo\Service;

use Arp\Demo\Service\DatabaseService;
use Arp\Demo\Service\UserFactory;
use Arp\Demo\Service\UserService;
use Arp\Demo\Service\UserServiceInterface;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

/**
 * @covers \Arp\Demo\Service\UserService
 *
 * @author  Alex Patterson <a.patterson@resume-library.com>
 * @package ArpTest\Demo\Service
 */
final class UserServiceTest extends TestCase
{
    /**
     * @var DatabaseService|MockObject
     */
    private $databaseService;

    /**
     * @var UserFactory|MockObject
     */
    private $factory;

    /**
     * Prepare the test case dependencies
     */
    public function setUp(): void
    {
        $this->databaseService = $this->createMock(DatabaseService::class);

        $this->factory = $this->createMock(UserFactory::class);
    }

    /**
     * Assert that the user service implements the UserServiceInterface
     */
    public function testImplementsUserServiceInterface(): void
    {
        $userService = new UserService($this->databaseService, $this->factory);

        $this->assertInstanceof(UserServiceInterface::class, $userService);
    }
}
