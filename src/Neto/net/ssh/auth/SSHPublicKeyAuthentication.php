<?php
namespace Neto\net\ssh\auth;

class SSHPublicKeyAuthentication extends AbstractSSHAuthentication
{
    /**
     * @var string
     */
    private $pubKeyFile;

    /**
     * @var string
     */
    private $prvKeyFile;

    /**
     * @var string
     */
    private $passphrase;

    /**
     * @param string $user
     * @param string $pubKeyFile
     * @param string $prvKeyFile
     * @param string $passphrase
     */
    public function __construct($user, $pubKeyFile, $prvKeyFile, $passphrase)
    {
        parent::__construct($user);

        $this->pubKeyFile = $pubKeyFile;
        $this->prvKeyFile = $prvKeyFile;
        $this->passphrase = $passphrase;
    }

    /*
     * (non-PHPdoc) @see \Neto\net\ssh\SSHAuthentication::authenticate()
     */
    public function authenticate($resource)
    {
        if ($this->testResource($resource)) {
            return ssh2_auth_pubkey_file($resource, $this->getUser(),
                $this->pubKeyFile, $this->prvKeyFile, $this->passphrase);
        }
    }
}