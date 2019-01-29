<?php
if ('cli-server' === PHP_SAPI) {
    // To help the built-in PHP dev server, check if the request was actually for
    // something which should probably be served as a static file
    $url = parse_url($_SERVER['REQUEST_URI']);
    $file = __DIR__ . $url['path'];
    if (is_file($file)) {
        return false;
    }
}
$root_path = str_replace('\\', '/', dirname(__DIR__));
/** @noinspection PhpIncludeInspection */
require $root_path . '/bootstrap.php';
session_start();
// Instantiate the app
$settings = require $root_path . '/config/settings.php';
try {
    $app = new \Slim\App($settings);
} catch (Exception $e) {
    print $e->getTraceAsString();
}
// Set up dependencies
require $root_path . '/src/dependencies.php';
// Register middleware
require $root_path . '/src/middleware.php';
// Register routes
require $root_path . '/src/routes.php';
// Run app
try {
    $app->run();
} catch (Exception $e) {
    print $e->getTraceAsString();
}
