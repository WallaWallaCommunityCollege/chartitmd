<?php
declare(strict_types=1);
$root_path = str_replace('\\', '/', dirname(__DIR__));
/** @noinspection PhpIncludeInspection */
require $root_path . '/bootstrap.php';

use ChartItMD\ChartItMD;

//session_start();
try {
    $app = new ChartItMD();
} catch (Exception $e) {
    print $e->getTraceAsString();
    exit(1);
}
// Register middleware
require $root_path . '/src/middleware.php';
// Register routes
require $root_path . '/src/routes.php';
// Run app
try {
    $app->run();
} catch (Exception $e) {
    print $e->getTraceAsString();
    exit(2);
}
