<?php
namespace Neto\net\ssh\auth;

use Neto\net\ssh\SSHAuthentication;

abstract class AbstractSSHAuthentication implements SSHAuthentication
{
    /**
     * @var string
     */
    private $user;

    /**
     * @param string $user
     */
    public function __construct($user)
    {
        $this->user = $user;
    }

    /*
     * (non-PHPdoc) @see \Neto\net\ssh\SSHAuthentication::getUser()
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param resource $resource
     * @throws \InvalidArgumentException
     * @return boolean
     */
    protected function testResource($resource)
    {
        if (!is_resource($resource)) {
            throw new \InvalidArgumentException('Invalid SSH resource.');
        }

        return true;
    }
}