<?php

declare(strict_types=1);

namespace Arp\Demo\Controller;

use Arp\Demo\Controller\Exception\ControllerException;
use Arp\Demo\Entity\User;
use Arp\Demo\Service\UserServiceInterface;
use Psr\Http\Message\RequestInterface;

/**
 * @author  Alex Patterson <a.patterson@resume-library.com>
 * @package Arp\Demo\Controller
 */
final class UserController extends AbstractController
{
    /**
     * @var UserServiceInterface
     */
    private $userService;

    /**
     * @param RequestInterface     $request
     * @param UserServiceInterface $userService
     */
    public function __construct(RequestInterface $request, UserServiceInterface $userService)
    {
        $this->userService = $userService;

        parent::__construct($request);
    }

    /**
     * Display a list of users
     *
     * @return User[]
     *
     * @throws ControllerException
     */
    public function list(): array
    {
        try {
            $users = $this->userService->getUsers();
        } catch (\Throwable $e) {
            throw new ControllerException(
                sprintf('Unable to load the list of users: %s', $e->getMessage())
            );
        }

        return compact('users');
    }

    /**
     * @return array
     *
     * @throws ControllerException
     */
    public function view(): array
    {
        $id = (int)$this->request->getHeader('id');

        try {
            $user = $this->userService->getUserById($id);
        } catch (\Throwable $e) {
            throw new ControllerException(
                sprintf('Unable to load user with id %d: %s', $id, $e->getMessage())
            );
        }

        return [
            'firstName' => $user->getFirstName(),
            'lastName' => $user->getLastName(),
        ];
    }
}
