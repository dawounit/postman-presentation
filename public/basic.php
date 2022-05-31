<?php

if (!isset($_SERVER['PHP_AUTH_USER'])) {
    header('WWW-Authenticate: Basic realm="Secured Area"');
    header('HTTP/1.0 401 Unauthorized');

    die('Not authorized!!!');
}

echo "Hello {$_SERVER['PHP_AUTH_USER']}.\n";
echo "You entered {$_SERVER['PHP_AUTH_PW']} as your password.\n";
