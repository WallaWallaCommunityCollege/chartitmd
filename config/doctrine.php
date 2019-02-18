<?php
declare(strict_types=1);

/**
 * Contains doctrine settings.
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

use ChartItMD\Pdo\Connection;
use Doctrine\Common\Cache\ApcuCache;
use Doctrine\Common\Cache\ArrayCache;
use Doctrine\ORM\Configuration as ORMConfiguration;
use Doctrine\ORM\EntityManager;
use Psr\Container\ContainerInterface;
use function DI\autowire;
use function DI\string;

$doctrine = [
    'ChartItMD.Doctrine.entityDir' => string('{ChartItMD.srcDir}Entities/'),
    'ChartItMD.Doctrine.proxyDir' => string('{ChartItMD.srcDir}Proxies/'),
    'ChartItMD.Doctrine.Parameters.proxyNamespace' => 'ChartItMD\Proxies',
    ORMConfiguration::class => autowire(ORMConfiguration::class),
    EntityManager::class => function (ContainerInterface $dic): EntityManager {
        $isDebug = $dic->get('mode') === 'debug';
        $cache = $isDebug ? ArrayCache::class : ApcuCache::class;
        $cache = new $cache;
        $config = $dic->get(ORMConfiguration::class);
        $config->setMetadataCacheImpl($cache);
        $driverImpl = $config->newDefaultAnnotationDriver($dic->get('ChartItMD.Doctrine.entityDir'));
        $config->setMetadataDriverImpl($driverImpl);
        $config->setQueryCacheImpl($cache);
        $config->setProxyDir($dic->get('ChartItMD.Doctrine.proxyDir'));
        $config->setProxyNamespace($dic->get('ChartItMD.Doctrine.Parameters.proxyNamespace'));
        $config->setAutoGenerateProxyClasses($isDebug);
        $connectionOptions = [
            'pdo' => $dic->get(Connection::class)
                         ->getPdo()
        ];
        return EntityManager::create($connectionOptions, $config);
    },
];
return $doctrine;
