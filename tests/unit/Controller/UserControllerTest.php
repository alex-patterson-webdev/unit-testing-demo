<?php

declare(strict_types=1);

namespace ArpTest\Demo\Controller;

use Arp\Demo\Controller\AbstractController;
use Arp\Demo\Controller\UserController;
use Arp\Demo\Service\UserServiceInterface;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\RequestInterface;

/**
 * @covers \Arp\Demo\Controller\UserController
 *
 * @author  Alex Patterson <a.patterson@resume-library.com>
 * @package ArpTest\Demo\Controller
 */
final class UserControllerTest extends TestCase
{
    /**
     * @var RequestInterface|MockObject
     */
    private $request;

    /**
     * @var UserServiceInterface|MockObject
     */
    private $userService;

    /**
     * Prepare the test case dependencies
     */
    public function setUp(): void
    {
        $this->request = $this->createMock(RequestInterface::class);

        $this->userService = $this->createMock(UserServiceInterface::class);
    }

    /**
     * Assert that the user controller extends from the AbstractController
     */
    public function testImplementsAbstractController(): void
    {
        $controller = new UserController($this->request, $this->userService);

        $this->assertInstanceOf(AbstractController::class, $controller);
    }
}
