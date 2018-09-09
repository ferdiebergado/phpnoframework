<?php
ini_set('display_errors', true);
error_reporting(E_ALL);

require BASE_PATH . 'vendor/autoload.php';
// Whoops Exception Handler
$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();

require CORE_PATH . 'DebugbarRenderer.php';
