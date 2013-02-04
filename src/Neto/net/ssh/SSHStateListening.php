<?php
namespace Neto\net\ssh;

class SSHStateListening extends SSHStateAuthenticated
{
    /* (non-PHPdoc)
     * @see \Neto\net\ssh\AbstractSSHState::execute()
     */
    public function execute($command, SSHConnection $context)
    {
        $ret = null;
        $stream = ssh2_exec($this->resource, $command);

        if (!is_resource($stream)) {
            throw new \RuntimeException();
        }

        stream_set_blocking($stream, true);

        while ( ($line =\fgets($stream, 4096)) !== false ) {
            $ret .= $line;
        }

        return $ret;
    }
}