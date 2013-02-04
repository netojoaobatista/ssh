<?php
namespace Neto\net\ssh;

abstract class AbstractSSHState implements SSHState
{
    /**
     * @var resource
     */
    protected $resource;

    /*
     * (non-PHPdoc) @see \Neto\net\ssh\SSHState::authenticate()
     */
    public function authenticate(SSHAuthentication $auth, SSHConnection $context)
    {
        $this->methodNotImplemented(__METHOD__);
    }

    /*
     * (non-PHPdoc) @see \Neto\net\ssh\SSHState::close()
     */
    public function close(SSHConnection $context)
    {
        $this->methodNotImplemented(__METHOD__);
    }

    /*
     * (non-PHPdoc) @see \Neto\net\ssh\SSHState::execute()
     */
    public function execute($command, SSHConnection $context)
    {
        $this->methodNotImplemented(__METHOD__);
    }

    /*
     * (non-PHPdoc) @see \Neto\net\ssh\SSHState::getDirectoryIterator()
     */
    public function getDirectoryIterator($path)
    {
        $this->methodNotImplemented(__METHOD__);
    }

    /*
     * (non-PHPdoc) @see \Neto\net\ssh\SSHState::getFingerprint()
     */
    public function getFingerprint(SSHConnection $context)
    {
        $this->methodNotImplemented(__METHOD__);
    }

    private function methodNotImplemented($method)
    {
        throw new \BadMethodCallException(
            sprintf('%s doesn\'t implement the %s method.', get_class($this),
                $method));
    }

    /**
     * @param AbstractSSHState $nextState
     * @param SSHConnection $context
     */
    protected function nextState(AbstractSSHState $nextState,
                                SSHConnection $context)
    {
        $nextState->resource = $this->resource;
        $context->changeState($nextState);
    }

    /*
     * (non-PHPdoc) @see \Neto\net\ssh\SSHState::open()
     */
    public function open($host, $port = 22, SSHConnection $context)
    {
        $this->methodNotImplemented(__METHOD__);
    }
}