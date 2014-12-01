<?php

$env = array(
    'production'  => array(
        'database' => array(
            'host'     => 'localhost',
            'username' => '',
            'password' => '',
            'dbname'   => '',
            'charset'  => 'utf8',
        ),
    ),
    'development' => array(
        'database' => array(
            'host'     => 'localhost',
            'username' => 'root',
            'password' => '',
            'dbname'   => 'phalcon_skeleton',
            'charset'  => 'utf8',
        ),
    ),
);

$config = array(
    'loader'   => array(
        'namespaces' => array(
            'Application' => APPLICATION_PATH . '/modules/Application',
            'FrontEnd'       => APPLICATION_PATH . '/modules/frontend',
            'BackEnd'       => APPLICATION_PATH . '/modules/backend',
        ),
    ),
    'modules'  => array(
        'frontend' => array(
            'className' => 'FrontEnd\Module',
            'path'      => APPLICATION_PATH . '/modules/frontend/Module.php'
        ),
        'backend' => array(
            'className' => 'BackEnd\Module',
            'path'      => APPLICATION_PATH . '/modules/backend/Module.php'
        ),
    ),
    'database' => $env[APPLICATION_ENV]['database'],
);

return new \Phalcon\Config($config);
