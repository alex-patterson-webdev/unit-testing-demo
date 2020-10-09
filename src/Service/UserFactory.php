<?php

declare(strict_types=1);

namespace Arp\Demo\Service;

use Arp\Demo\Entity\User;

/**
 * @author  Alex Patterson <a.patterson@resume-library.com>
 * @package Arp\Demo\Service
 */
class UserFactory
{
    /**
     * @param array $data
     *
     * @return User
     *
     * @throws \InvalidArgumentException
     */
    public function createUser(array $data): User
    {
        if (empty($data['firstName'])) {
            throw new \InvalidArgumentException('The  user\'s first name is missing!');
        }

        if (empty($data['lastName'])) {
            throw new \InvalidArgumentException('The user\'s last name is missing!');
        }

        $user = new User();
        $user->setFirstName($data['firstName']);
        $user->setLastName($data['lastName']);

        if (!empty($data['id'])) {
            $user->setId($data['id']);
        }

        return $user;
    }
}
