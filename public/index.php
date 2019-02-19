<?php
declare(strict_types=1);
if ('cli-server' === PHP_SAPI) {
    // To help the built-in PHP dev server, check if the request was actually for
    // something which should probably be served as a static file.
    // This closely matches what the rewrite rules in .htaccess file for Apache
    // does for us.
    $url = parse_url($_SERVER['REQUEST_URI']);
    $file = __DIR__ . $url['path'];
    if (is_file($file)) {
        return false;
    }
}
$root_path = str_replace('\\', '/', dirname(__DIR__));
/** @noinspection PhpIncludeInspection */
require $root_path . '/bootstrap.php';

use ChartItMD\ChartItMD;
use josegonzalez\Dotenv\Loader;

// Load the environmental variables from .env in the root directory.
$env = (new Loader([dirname(__DIR__) . '/.env']))->parse();
$env->toEnv()
    ->putenv();
session_start();
try {
    $app = new ChartItMD();
} catch (Exception $e) {
    print $e->getTraceAsString();
}
// Set up dependencies
//require $root_path . '/src/dependencies.php';
// Register middleware
//require $root_path . '/src/middleware.php';
// Register routes
//require $root_path . '/src/routes.php';
// Run app
try {
    $app->run();
} catch (Exception $e) {
    print $e->getTraceAsString();
}
