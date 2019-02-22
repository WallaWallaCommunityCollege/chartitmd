<?php
declare(strict_types=1);
/**
 * Contains help for Doctrine cli tool.
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

use Doctrine\Common\Annotations\AnnotationException;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMException;
use Doctrine\ORM\Tools\Console\ConsoleRunner;
use Doctrine\ORM\Tools\Setup;

// Create a simple "default" Doctrine ORM configuration for Annotations
$isDevMode = true;
try {
    $config = Setup::createAnnotationMetadataConfiguration([dirname(__DIR__) . '/src'], $isDevMode);
} catch (AnnotationException $e) {
}
$conn = [
    'dbname' => 'chartitmd',
    'driver' => 'pdo_mysql',
    'host' => 'localhost',
    'user' => 'CIMUser',
    'password' => 'secret'
];
// obtaining the entity manager
try {
    $entityManager = EntityManager::create($conn, $config);
} catch (ORMException $e) {
} catch (\InvalidArgumentException $e) {
}
/** @var EntityManager $entityManager */
return ConsoleRunner::createHelperSet($entityManager);

