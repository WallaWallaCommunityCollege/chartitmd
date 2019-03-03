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

use ChartItMD\Model\Type\Uuid64Type;
use Doctrine\Common\Cache\ApcuCache;
use Doctrine\Common\Cache\ArrayCache;
use Doctrine\DBAL\Types\Type;
use Doctrine\ORM\Configuration as ORMConfiguration;
use Doctrine\ORM\EntityManager;
use Psr\Container\ContainerInterface;
use function DI\autowire;
use function DI\string;

$doctrine = [
    'ChartItMD.Doctrine.entityDir' => string('{ChartItMD.srcDir}Model/Entity'),
    'ChartItMD.Doctrine.proxyDir' => string('{ChartItMD.srcDir}Model/Proxy'),
    'ChartItMD.Doctrine.Parameters.proxyNamespace' => 'ChartItMD\Model\Proxy',
    'ChartItMD.Doctrine.Parameters.CustomTypes' => [
        'uuid64' => ['class' => Uuid64Type::class, 'extends' => 'binary'],
    ],
    ORMConfiguration::class => autowire(ORMConfiguration::class),
    EntityManager::class => function (ContainerInterface $dic): EntityManager {
        $isDebug = $dic->get('mode') === 'debug';
        $config = $dic->get(ORMConfiguration::class);
        // Setup all the caches that Doctrine uses to improve performance.
        $cache = $isDebug ? ArrayCache::class : ApcuCache::class;
        $cache = new $cache;
        $driverImpl = $config->newDefaultAnnotationDriver($dic->get('ChartItMD.Doctrine.entityDir'), false);
        $config->setMetadataDriverImpl($driverImpl);
        $config->setProxyDir($dic->get('ChartItMD.Doctrine.proxyDir'));
        $config->setProxyNamespace($dic->get('ChartItMD.Doctrine.Parameters.proxyNamespace'));
        $config->setAutoGenerateProxyClasses($isDebug);
//        $config->setMetadataCacheImpl($cache);
        $config->setQueryCacheImpl($cache);
        $config->setResultCacheImpl($cache);
        // Assemble database parameters.
        $dbParams = [
            'driver' => 'pdo_' . $dic->get('ChartItMD.Pdo.Parameters.platform'),
            'host' => $dic->get('ChartItMD.Pdo.Parameters.hostName'),
            'user' => $dic->get('ChartItMD.Pdo.Parameters.username'),
            'password' => $dic->get('ChartItMD.Pdo.Parameters.password'),
            'dbname' => $dic->get('ChartItMD.Pdo.Parameters.database')
        ];
        $em = EntityManager::create($dbParams, $config);
        $conn = $em->getConnection();
        $customTypes = $dic->get('ChartItMD.Doctrine.Parameters.CustomTypes');
        if (!empty($customTypes)) {
            foreach ($customTypes as $type => $v) {
                Type::addType($type, $v['class']);
                $conn->getDatabasePlatform()
                     ->registerDoctrineTypeMapping($type, $v['extends']);
            }
        }
        $conn->exec((string)$dic->get('ChartItMD.Pdo.Parameters.initialization'));
        return $em;
    },
];
return $doctrine;
