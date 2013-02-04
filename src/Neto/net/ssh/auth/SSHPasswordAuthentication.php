<?php
namespace Neto\net\ssh\auth;

class SSHPasswordAuthentication extends AbstractSSHAuthentication
{
    /**
     * @var string
     */
    private $pswd;

    /**
     * @param string $user
     * @param string $pswd
     */
    public function __construct($user, $pswd)
    {
        parent::__construct($user);

        $this->pswd = $pswd;
    }

    /*
     * (non-PHPdoc) @see \Neto\net\ssh\SSHAuthentication::authenticate()
     */
    public function authenticate($resource)
    {
        if ($this->testResource($resource)) {
            return ssh2_auth_password($resource, $this->getUser(), $this->pswd);
        }
    }
}