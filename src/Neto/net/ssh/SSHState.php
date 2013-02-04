<?php
namespace Neto\net\ssh;

interface SSHState
{
    /**
     * Authenticates the connection.
     *
     * @param SSHAuthentication $auth
     * @param SSHConnection $context
     */
    public function authenticate(SSHAuthentication $auth,
                                 SSHConnection $context);

    /**
     * Closes the connection.
     *
     * @param SSHConnection $context
     */
    public function close(SSHConnection $context);

    /**
     * Executes the specified $command in the server.
     *
     * @param string $command
     * @param SSHConnection $context
     */
    public function execute($command, SSHConnection $context);

    /**
     * Gets a SSHDirectoryIterator to iterate the connected server filesystem.
     *
     * @param string $path
     * @return SSHDirectoryIterator
     */
    public function getDirectoryIterator($path);

    /**
     * Gets the server fingerprint.
     *
     * @param SSHConnection $context
     * @return string
     */
    public function getFingerprint(SSHConnection $context);

    /**
     * Open the ssh connection.
     *
     * @param string $host
     * @param integer $port
     * @param SSHConnection $context
     */
    public function open($host, $port = 22, SSHConnection $context);
}