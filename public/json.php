<?php

header('Content-Type: text/json');

echo json_encode([
    'welcome' => sprintf('Hello %s! You are so pretty %s <3 <3 <3', $_POST['name'], $_POST['kind']),
    'your-data' => [
        1 => 'ras',
        2 => 'dwa',
        3 => 'czy',
        999 => (object)[
            'firstProperty' => 'Nah, nah, nah.',
            'secondProperty' => 'Blah, blah, blah.',
            'thirdProperty' => 'Nioch, nioch, nioch.',
        ],
        'abc' => 123,
    ],
]);
