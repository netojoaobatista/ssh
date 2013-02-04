<?php
namespace Neto\net\ssh;

class SSHStateConnected extends AbstractSSHState
{
    /*
     * (non-PHPdoc) @see \Neto\net\ssh\AbstractSSHState::close()
     */
    public function close(SSHConnection $context)
    {
        $this->resource = null;
        $this->nextState(new SSHStateClosed(), $context);
    }
}