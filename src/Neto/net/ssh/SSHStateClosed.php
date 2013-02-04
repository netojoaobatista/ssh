<?php
namespace Neto\net\ssh;

class SSHStateClosed extends AbstractSSHState
{
    private $context;

    /*
     * (non-PHPdoc) @see \Neto\net\ssh\AbstractSSHState::open()
     */
    public function open($host, $port = 22, SSHConnection $context)
    {
        $resource = ssh2_connect($host, $port, array(
            'disconnect' => array($this,'disconnect')
        ));

        if (!is_resource($resource)) {
            throw new \RuntimeException(
                'Não foi possível estabelecer a conexão.');
        }

        $this->context = $context;
        $this->resource = $resource;
        $this->nextState(new SSHStateEstabilished(), $context);

        return true;
    }

    public function disconnect()
    {
        $this->resource = null;
        $this->nextState(new SSHStateClosed(), $this->context);
    }
}