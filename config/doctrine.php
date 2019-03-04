<?php
declare(strict_types=1);

/**
 * Contains doctrine settings.
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

use ChartItMD\Model\Type\Uuid64Type;
use Doctrine\Common\Cache\ApcuCache;
use Doctrine\Common\Cache\ArrayCache;
use Doctrine\DBAL\DriverManager;
use Doctrine\DBAL\Types\Type;
use Doctrine\Migrations\Configuration\Configuration as MConfiguration;
use Doctrine\ORM\Configuration as ORMConfiguration;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Container\ContainerInterface;
use function DI\autowire;
use function DI\get;
use function DI\string;

$doctrine = [
    'ChartItMD.Doctrine.entityDir' => string('{ChartItMD.srcDir}Model/Entity'),
    'ChartItMD.Doctrine.migrationDir' => string('{ChartItMD.srcDir}Model/Migration'),
    'ChartItMD.Doctrine.proxyDir' => string('{ChartItMD.srcDir}Model/Proxy'),
    'ChartItMD.Doctrine.Parameters.proxyNamespace' => 'ChartItMD\Model\Proxy',
    'ChartItMD.Doctrine.Parameters.migrationsNamespace' => 'ChartItMD\Model\Migration',
    'ChartItMD.Doctrine.Parameters.migrationsName' => 'ChartItMD Migrations',
    'ChartItMD.Doctrine.Parameters.migrationsVersion' => '0.0.1',
    'ChartItMD.Doctrine.Parameters.CustomTypes' => [
        'uuid64' => ['class' => Uuid64Type::class, 'extends' => 'binary'],
    ],
    'ChartItMD.Doctrine.MConnection' => function (ContainerInterface $dic) {
        $dbParams = [
            'driver' => 'pdo_' . $dic->get('ChartItMD.Pdo.Parameters.platform'),
            'host' => $dic->get('ChartItMD.Pdo.Parameters.hostName'),
            'user' => $dic->get('ChartItMD.Pdo.Parameters.username'),
            'password' => $dic->get('ChartItMD.Pdo.Parameters.password'),
            'dbname' => $dic->get('ChartItMD.Pdo.Parameters.database'),
        ];
        return DriverManager::getConnection($dbParams);
    },
    MConfiguration::class => function (ContainerInterface $dic): MConfiguration {
        $conn = $dic->get('ChartItMD.Doctrine.MConnection');
        $config = new MConfiguration($conn);
        $config->setName((string)$dic->get('ChartItMD.Doctrine.Parameters.migrationsName'));
        $config->setMigrationsNamespace((string)$dic->get('ChartItMD.Doctrine.Parameters.migrationsNamespace'));
        $config->setMigrationsDirectory((string)$dic->get('ChartItMD.Doctrine.migrationDir'));
        return $config;
    },
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
            'dbname' => $dic->get('ChartItMD.Pdo.Parameters.database'),
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
    EntityManagerInterface::class => get(EntityManager::class),
];
return $doctrine;
