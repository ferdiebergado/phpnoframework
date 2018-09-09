<?php
define('BASE_PATH', dirname(dirname(__FILE__)) . '/');
define('VIEW_PATH', BASE_PATH . 'views/');
define('MODEL_PATH', BASE_PATH . 'models/');
define('CORE_PATH', BASE_PATH . 'core/');
define('CONFIG_PATH', BASE_PATH . 'config/');
define('SESSION_PATH', BASE_PATH . 'tmp/sessions/');
define('CONTROLLER_PATH', BASE_PATH . 'controllers/');

require CORE_PATH . 'helpers.php';

if (config('env') === 'dev') {
    require CORE_PATH . 'devtools.php';
}

session_start([
    'save_path' => SESSION_PATH,
    'cookie_httponly' => true
]);

require CORE_PATH . 'View.php';
$index = new View('login');
$index->render();
