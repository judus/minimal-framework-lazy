<?php

return [

// ----------------------------------------------------------------------------
// PATHS

    'paths' => [
        'app' => 'modules',
        'base' => '',
        'helpers' => 'helpers',
        'host' => 'localhost:8000',
        'modules' => 'modules',
        'public' => '',
        'storage' => 'minimal/storage',
        'system' => realpath(__DIR__ . '/../../'),
        'translations' => 'minimal/storage/lang/lang.json',
        'views' => 'minimal/templates/customer/views'
    ],

// ----------------------------------------------------------------------------
// APPLICATION
/*
    'app' => [
        'bindingsFile' => 'minimal/config/bindings.php',
        'configFile' => 'minimal/config/config.php',
        'providersFile' => 'minimal/config/providers.php',
        'routesFile' => 'minimal/config/routes.php',
    ],
*/
// ----------------------------------------------------------------------------
// MODULES

    'modules' => [
        'bindingsFile' => 'Config/bindings.php',
        'configFile' => 'Config/config.php',
        'providersFile' => 'Config/providers.php',
        'routesFile' => 'Config/routes.php',
    ],

// ----------------------------------------------------------------------------
// DATABASE

    'database' => [
        'driver' => 'mysql',
        'host' => 'localhost',
        'port' => '3306',
        'user' => '',
        'password' => '',
        'database' => '',
        'charset' => 'utf8',
        'handler' => \PDO::class,
        'handlerOptions' => [
            \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
            \PDO::ATTR_EMULATE_PREPARES => false
        ]
    ],

// ----------------------------------------------------------------------------
// ERROR REPORTING

    'errors' => [
        'error_reporting' => 0,
        'display_errors' => 0
    ],

// ----------------------------------------------------------------------------
// STORAGE FOLDERS

    'storage' => [
        'app' => 'minimal/storage/minimal/app',
        'cache' => 'minimal/storage/minimal/cache',
        'logs' => 'minimal/storage/minimal/logs',
        'translation' => 'minimal/storage/lang'
    ],

];