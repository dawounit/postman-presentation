<?php

$headers = getallheaders();


if ($headers['Xsupersafeauth'] !== md5($headers['Xsupersafeuser'] . 'UpdDL6mNCGZXP428y57AbPknKsPcGunV')) {
    http_response_code(403);
    die('Access denied!');
}

echo 'Hello my friend!';
