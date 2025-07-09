<?php

// This is used to initialize the application's environment.

//  - Loads environment variables (e.g., using dotenv)
//  - Sets up configuration settings.
//  - Includes autoloaders (like Composer’s).
//  - Prepares database connections or other services.

// Acts as the entry point for shared setup logic needed before the app runs.


// TODO: Add other paths
define('BASE_PATH', realpath(__DIR__));
define('LAYOUTS_PATH', realpath(BASE_PATH . '/layouts'));
define('HANDLERS_PATH', realpath(BASE_PATH . "/handlers"));
define('UTILS_PATH', realpath(BASE_PATH . "/utils"));
define('STATIC_DATAS_PATH', realpath(BASE_PATH . '/staticDatas'));
define('DUMMIES_PATH', realpath(BASE_PATH . "/staticDatas/dummies"));

chdir(BASE_PATH);
