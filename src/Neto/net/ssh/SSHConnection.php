<?php
namespace Neto\net\ssh;

class SSHConnection
{
    /**
     * @var SSHState
     */
    private $state;

    public function __construct()
    {
        //initial state
        $this->state = new SSHStateClosed();
    }

    /**
     * Authenticates the connection.
     *
     * @param SSHAuthentication $auth
     * @return boolean
     */
    public function authenticate(SSHAuthentication $auth)
    {
        return $this->state->authenticate($auth, $this);
    }

    /**
     * Closes the connection.
     */
    public function close()
    {
        $this->state->close($this);
    }

    /**
     * Executes the specified $command in the server.
     *
     * @param string $command
     * @return string
     */
    public function execute($command)
    {
        return $this->state->execute($command, $this);
    }

    /**
     * Gets a SSHDirectoryIterator to iterate the connected server filesystem.
     *
     * @param string $path
     * @return SSHDirectoryIterator
     */
    public function getDirectoryIterator($path) {
        return $this->state->getDirectoryIterator($path);
    }

    /**
     * Gets the server fingerprint.
     *
     * @return string
     */
    public function getFingerprint()
    {
        return $this->state->getFingerprint($this);
    }

    /**
     * Open the ssh connection.
     *
     * @param string $host
     * @param integer $port
     * @return boolean
     */
    public function open($host, $port = 22)
    {
        return $this->state->open($host, $port, $this);
    }

    /**
     * Change the connection state.
     *
     * @param SSHState $state
     */
    public function changeState(SSHState $state)
    {
        $this->state = $state;
    }
}