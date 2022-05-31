<?php

header('Content-Type: text/json');

$input = json_decode(file_get_contents('php://input'));

if (!isset($input->username) || !isset($input->password)) {
    http_response_code(404);
    die(json_encode([
        'success' => false,
        'error' => 'Missing credentials!',
    ]));
}

if ($input->username !== 'dwojcik') {
    http_response_code(404);
    die(json_encode([
        'success' => false,
        'error' => 'User not found!',
    ]));
}

if ($input->password !== 'admn123') {
    http_response_code(404);
    die(json_encode([
        'success' => false,
        'error' => 'Invalid password!',
    ]));
}

echo json_encode([
    'success' => true,
    'secret' => md5($input->username . 'UpdDL6mNCGZXP428y57AbPknKsPcGunV'),
]);
