Simple SSH client in PHP
========================

SSH connection with simple user and password authentication
-----------------------------------------------------------

    <?php
    use Neto\net\ssh\SSHConnection;
    use Neto\net\ssh\auth\SSHPasswordAuthentication;
    
    $ssh = new SSHConnection();
    $ssh->open('127.0.0.1');
    $ssh->authenticate(
        new SSHPasswordAuthentication('user', 'password'));
    
    $directoryIterator = $ssh->getDirectoryIterator('/var/www');
    
    while ($directoryIterator->valid()) {
        $splFileInfo = $directoryIterator->current();
    
        if ($splFileInfo->isFile()) {
            $splFileObject = $directoryIterator->openFile('r');
        }
    
        $directoryIterator->next();
    }

SSH connection with user's public key
-------------------------------------

    <?php
    use Neto\net\ssh\SSHConnection;
    use Neto\net\ssh\auth\SSHPublicKeyAuthentication;
    
    $ssh = new SSHConnection();
    $ssh->open('example.com');
    $ssh->authenticate(
        new SSHPublicKeyAuthentication('user',
                                       '/home/user/.ssh/id_rsa.pub',
                                       '/home/user/.ssh/id_rsa',
                                       'passphrase'));
    
    $directoryIterator = $ssh->getDirectoryIterator('/var/www');
    
    while ($directoryIterator->valid()) {
        $splFileInfo = $directoryIterator->current();
    
        if ($splFileInfo->isFile()) {
            $splFileObject = $directoryIterator->openFile('r');
        }
    
        $directoryIterator->next();
    }