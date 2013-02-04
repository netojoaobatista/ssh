<?php
namespace Neto\net\ssh;

interface SSHAuthentication
{
    /**
     * Authenticates the specified ssh connection.
     *
     * @param resource $resource
     */
    public function authenticate($resource);

    /**
     * Gets the authenticated user name (if available).
     *
     * @return string
     */
    public function getUser();
}