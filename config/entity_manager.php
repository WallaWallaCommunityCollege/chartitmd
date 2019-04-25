<?php
declare(strict_types=1);
/**
 * Contains entity manager for cli apps.
 *
 * PHP version 7.2+
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

use DI\ContainerBuilder;
use Doctrine\ORM\EntityManager;
use josegonzalez\Dotenv\Loader;

// Initial same environment that application will be running in so they don't
// become desynchronized later.
$builder = new ContainerBuilder();
try {
    $builder->addDefinitions(dirname(__DIR__) . '/config/config.php')
            ->addDefinitions(dirname(__DIR__) . '/config/dot_env.php')
            ->addDefinitions(dirname(__DIR__) . '/config/pdo.php')
            ->addDefinitions(dirname(__DIR__) . '/config/doctrine.php');
    $dic = $builder->build();
    $dic->set('mode', 'debug');
    $dic->get(Loader::class);
    $entityManager = $dic->get(EntityManager::class);
} catch (Exception $e) {
    print $e->getTraceAsString();
    exit(1);
}
return $entityManager;
