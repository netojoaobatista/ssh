<?php
namespace Neto\net\ssh;

class SSHDirectoryIterator extends \DirectoryIterator
{
    public function __construct($resource, $path)
    {
        $sftp = ssh2_sftp($resource);
        $realpath = 'ssh2.sftp://' . $sftp . $path;

        parent::__construct($realpath);
    }
}