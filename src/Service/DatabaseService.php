<?php

declare(strict_types=1);

namespace Arp\Demo\Service;

/**
 * @author  Alex Patterson <a.patterson@resume-library.com>
 * @package Arp\Demo\Service
 */
class DatabaseService
{
    /**
     * @var array[]
     */
    private $users = [
        1 => [
            'id' => 1,
            'firstName' => 'Alex',
            'lastName' => 'Patterson',
        ],
        2 => [
            'id' => 2,
            'firstName' => 'Fred',
            'lastName' => 'Blogs',
        ],
        3 => [
            'id' => 3,
            'firstName' => 'Jennifer',
            'lastName' => 'Clayton',
        ],
    ];

    /**
     * @param int $id
     *
     * @return array|null
     */
    public function find(int $id): ?array
    {
        return $this->users[$id] ?? null;
    }

    /**
     * @return array[]
     */
    public function getAll(): array
    {
        return $this->users;
    }
}
