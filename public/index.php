<?php
declare(strict_types=1);
$rootPath = str_replace('\\', '/', dirname(__DIR__));
/** @noinspection PhpIncludeInspection */
require $rootPath . '/bootstrap.php';
use ChartItMD\ChartItMD;
use josegonzalez\Dotenv\Loader;

//session_start();
try {
    $app = new ChartItMD();
} catch (Exception $e) {
    print $e->getTraceAsString();
    exit(1);
}
// Load environment from dot_env settings.
$app->getContainer()
    ->get(Loader::class);
// Register middleware
require_once $rootPath . '/src/middleware.php';
// Register routes
require_once $rootPath . '/src/routes.php';
// Run app
try {
    $app->run();
} catch (Exception $e) {
    print $e->getTraceAsString();
    exit(2);
}
