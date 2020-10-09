<?php

declare(strict_types=1);

namespace Arp\Demo\Controller;

use Psr\Http\Message\RequestInterface;

/**
 * @author  Alex Patterson <a.patterson@resume-library.com>
 * @package Arp\Demo\Controller
 */
abstract class AbstractController
{
    /**
     * @var RequestInterface
     */
    protected $request;

    /**
     * @param RequestInterface $request
     */
    public function __construct(RequestInterface $request)
    {
        $this->request = $request;
    }
}
