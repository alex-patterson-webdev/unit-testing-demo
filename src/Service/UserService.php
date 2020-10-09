<?php

declare(strict_types=1);

namespace Arp\Demo\Service;

use Arp\Demo\Entity\User;

/**
 * @author  Alex Patterson <a.patterson@resume-library.com>
 * @package Arp\Demo\Service
 */
class UserService implements UserServiceInterface
{
    /**
     * @var DatabaseService
     */
    private $databaseService;

    /**
     * @var UserFactory
     */
    private $factory;

    /**
     * @param DatabaseService $databaseService
     * @param UserFactory $factory
     */
    public function __construct(DatabaseService $databaseService, UserFactory $factory)
    {
        $this->databaseService = $databaseService;
        $this->factory = $factory;
    }

    /**
     * @param int $id
     *
     * @return User
     */
    public function getUserById(int $id): User
    {
        $userData = $this->databaseService->find($id);

        return $this->factory->createUser($userData);
    }

    /**
     * @return array
     */
    public function getUsers(): array
    {
        $userData = $this->databaseService->getAll();

        return $this->createUsers($userData);
    }

    /**
     * @param array $data
     *
     * @return User[]
     */
    private function createUsers(array $data): array
    {
        $users = [];
        foreach ($data as $userData) {
            $users[] = $this->factory->createUser($userData);
        }
        return $users;
    }
}
