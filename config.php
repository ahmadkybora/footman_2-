<?php

return [
    'database' => [
        'name' => 'framework',
        'username' => 'root',
        'password' => '',
        'connection' => 'mysql:host=127.0.0.1;',
        'options' => [
            \PDO::ATTR_ERRMODE=>\PDO::ERRMODE_EXCEPTION
        ]
    ]
];

//define('DB_NAME', '');
//define('DB_HOST', '');
//define('DB_USER', '');
//define('DB_PASS', '');
