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

use ChartItMD\Models\Types\Uuid64Type;
use Doctrine\Common\Cache\ApcuCache;
use Doctrine\Common\Cache\ArrayCache;
use Doctrine\DBAL\Types\Type;
use Doctrine\ORM\Configuration as ORMConfiguration;
use Doctrine\ORM\EntityManager;
use Psr\Container\ContainerInterface;
use function DI\autowire;
use function DI\string;

$doctrine = [
    'ChartItMD.Doctrine.entityDir' => string('{ChartItMD.srcDir}Models/Entities/'),
    'ChartItMD.Doctrine.proxyDir' => string('{ChartItMD.srcDir}Models/Proxies/'),
    'ChartItMD.Doctrine.Parameters.proxyNamespace' => 'ChartItMD\Models\Proxies',
    'ChartItMD.Doctrine.Parameters.CustomTypes' => [
        'uuid64' => Uuid64Type::class
    ],
    ORMConfiguration::class => autowire(ORMConfiguration::class),
    EntityManager::class => function (ContainerInterface $dic): EntityManager {
        $isDebug = $dic->get('mode') === 'debug';
        $cache = $isDebug ? ArrayCache::class : ApcuCache::class;
        $cache = new $cache;
        $config = $dic->get(ORMConfiguration::class);
        $config->setMetadataCacheImpl($cache);
        $config->setQueryCacheImpl($cache);
        $config->setResultCacheImpl($cache);
        $driverImpl = $config->newDefaultAnnotationDriver($dic->get('ChartItMD.Doctrine.entityDir'));
        $config->setMetadataDriverImpl($driverImpl);
        $config->setProxyDir($dic->get('ChartItMD.Doctrine.proxyDir'));
        $config->setProxyNamespace($dic->get('ChartItMD.Doctrine.Parameters.proxyNamespace'));
        $config->setAutoGenerateProxyClasses($isDebug);
        $customTypes = $dic->get('ChartItMD.Doctrine.Parameters.CustomTypes');
        if (!empty($customTypes)) {
            foreach ($customTypes as $type => $class) {
                Type::addType($type, $class);
            }
        }
        // Assemble database parameters.
        $connection = [
            'driver' => 'pdo_' . $dic->get('ChartItMD.Pdo.Parameters.platform'),
            'host' => $dic->get('ChartItMD.Pdo.Parameters.hostName'),
            'user' => $dic->get('ChartItMD.Pdo.Parameters.username'),
            'password' => $dic->get('ChartItMD.Pdo.Parameters.password'),
            'dbname' => $dic->get('ChartItMD.Pdo.Parameters.database')
        ];
        $em = EntityManager::create($connection, $config);
        $em->getConnection()
           ->exec((string)$dic->get('ChartItMD.Pdo.Parameters.initialization'));
        return $em;
    },
];
return $doctrine;
