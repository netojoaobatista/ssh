<?php
namespace Neto\net\ssh;

class SSHStateAuthenticated extends SSHStateConnected
{
    /*
     * (non-PHPdoc) @see \Neto\net\ssh\AbstractSSHState::getDirectoryIterator()
     */
    public function getDirectoryIterator($path)
    {
        return new SSHDirectoryIterator($this->resource, $path);
    }
}