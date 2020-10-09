<?php

declare(strict_types=1);

namespace Arp\Demo\Service;

use Arp\Demo\Entity\User;

/**
 * @author  Alex Patterson <a.patterson@resume-library.com>
 * @package Arp\Demo\Service
 */
interface UserServiceInterface
{
    /**
     * @param int $id
     *
     * @return User
     */
    public function getUserById(int $id): User;

    /**
     * @return User[]
     */
    public function getUsers(): array;
}
