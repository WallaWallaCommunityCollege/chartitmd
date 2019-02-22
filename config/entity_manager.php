<?php
declare(strict_types=1);
/**
 * Contains entity manager for cli apps.
 *
 * PHP version 7.0+
 *
 * LICENSE:
 * This file is part of ChartItMD.
 * Copyright (C) 2019 ChartItMD Development Group
 *
 * @author    Michael Cummings <mgcummings@yahoo.com>
 * @copyright 2019 ChartItMD Development Group
 * @license   Proprietary
 */
require_once dirname(__DIR__) . '/vendor/autoload.php';

use ChartItMD\ChartItMD;
use Doctrine\Common\Annotations\AnnotationException;
use Doctrine\Common\Cache\ArrayCache;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMException;
use Doctrine\ORM\Tools\Setup;
use josegonzalez\Dotenv\Loader;

// Initial same environment that application will be running in so they don't
// become desynchronized later.
try {
    $app = new ChartItMD();
} catch (Exception $e) {
    print $e->getTraceAsString();
    exit(1);
}
// Get container object.
$dic = $app->getContainer();
// Ensure required environment variables are available.
$dic->get(Loader::class);
// Assemble database parameters.
$dbParams = [
    'driver' => 'pdo_' . $dic->get('ChartItMD.Pdo.Parameters.platform'),
    'host' => $dic->get('ChartItMD.Pdo.Parameters.hostName'),
    'user' => $dic->get('ChartItMD.Pdo.Parameters.username'),
    'password' => $dic->get('ChartItMD.Pdo.Parameters.password'),
    'dbname' => $dic->get('ChartItMD.Pdo.Parameters.database')
];
$cache = new ArrayCache();
try {
    $config = Setup::createAnnotationMetadataConfiguration(
        [$dic->get('ChartItMD.Doctrine.entityDir')],
        false,
        $dic->get('ChartItMD.Doctrine.proxyDir'), $cache,
        false);
} catch (AnnotationException $e) {
    print $e->getTraceAsString();
    exit(2);
}
try {
    $entityManager = EntityManager::create($dbParams, $config);
} catch (ORMException $e) {
    print $e->getTraceAsString();
    exit(3);
} catch (InvalidArgumentException $e) {
    print $e->getTraceAsString();
    exit(4);
}
return $entityManager;
