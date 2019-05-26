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
use ChartItMD\Model\Entity\BloodPressure;
use ChartItMD\Model\Entity\Gender;
use ChartItMD\Model\Entity\Height;
use ChartItMD\Model\Entity\Method;
use ChartItMD\Model\Entity\OxygenSaturation;
use ChartItMD\Model\Entity\Pain;
use ChartItMD\Model\Entity\Patient;
use ChartItMD\Model\Entity\Permission;
use ChartItMD\Model\Entity\Pulse;
use ChartItMD\Model\Entity\Respiration;
use ChartItMD\Model\Entity\Role;
use ChartItMD\Model\Entity\RoleHierarchy;
use ChartItMD\Model\Entity\RolePermission;
use ChartItMD\Model\Entity\Temperature;
use ChartItMD\Model\Entity\UnitOfMeasurement;
use ChartItMD\Model\Entity\User;
use ChartItMD\Model\Entity\UserRole;
use ChartItMD\Model\Entity\VitalSigns;
use ChartItMD\Model\Entity\Weight;
use ChartItMD\Model\Repository\BloodPressureRepository;
use ChartItMD\Model\Repository\GenderRepository;
use ChartItMD\Model\Repository\HeightRepository;
use ChartItMD\Model\Repository\LocationRepository;
use ChartItMD\Model\Repository\MethodRepository;
use ChartItMD\Model\Repository\OxygenSaturationRepository;
use ChartItMD\Model\Repository\PainRepository;
use ChartItMD\Model\Repository\PatientRepository;
use ChartItMD\Model\Repository\PermissionRepository;
use ChartItMD\Model\Repository\PulseRepository;
use ChartItMD\Model\Repository\RespirationRepository;
use ChartItMD\Model\Repository\RoleHierarchyRepository;
use ChartItMD\Model\Repository\RolePermissionRepository;
use ChartItMD\Model\Repository\RoleRepository;
use ChartItMD\Model\Repository\TemperatureRepository;
use ChartItMD\Model\Repository\UnitOfMeasurementRepository;
use ChartItMD\Model\Repository\UserRepository;
use ChartItMD\Model\Repository\UserRoleRepository;
use ChartItMD\Model\Repository\VitalSignsRepository;
use ChartItMD\Model\Repository\WeightRepository;
use ChartItMD\Model\Type\Uuid64Type;
use Doctrine\Common\Cache\ApcuCache;
use Doctrine\Common\Cache\ArrayCache;
use Doctrine\DBAL\DriverManager;
use Doctrine\DBAL\Types\Type;
use Doctrine\Migrations\Configuration\Configuration as MConfiguration;
use Doctrine\ORM\Configuration as ORMConfiguration;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use phpDocumentor\Reflection\Location;
use Psr\Container\ContainerInterface;
use function DI\autowire;
use function DI\get;
use function DI\string;

return [
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
        $isDebug = 'debug' === $dic->get('mode');
        $config = $dic->get(ORMConfiguration::class);
        // Setup all the caches that Doctrine uses to improve performance.
        $cache = $isDebug ? ArrayCache::class : ApcuCache::class;
        $cache = new $cache();
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
    BloodPressureRepository::class => function (ContainerInterface $dic): BloodPressureRepository {
        return $dic->get(EntityManager::class)
                   ->getRepository(BloodPressure::class);
    },
    GenderRepository::class => function (ContainerInterface $dic): GenderRepository {
        return $dic->get(EntityManager::class)
                   ->getRepository(Gender::class);
    },
    HeightRepository::class => function (ContainerInterface $dic): HeightRepository {
        return $dic->get(EntityManager::class)
                   ->getRepository(Height::class);
    },
    LocationRepository::class => function (ContainerInterface $dic): LocationRepository {
        return $dic->get(EntityManager::class)
                   ->getRepository(Location::class);
    },
    MethodRepository::class => function (ContainerInterface $dic): MethodRepository {
        return $dic->get(EntityManager::class)
                   ->getRepository(Method::class);
    },
    OxygenSaturationRepository::class => function (ContainerInterface $dic): OxygenSaturationRepository {
        return $dic->get(EntityManager::class)
                   ->getRepository(OxygenSaturation::class);
    },
    PainRepository::class => function (ContainerInterface $dic): PainRepository {
        return $dic->get(EntityManager::class)
                   ->getRepository(Pain::class);
    },
    PatientRepository::class => function (ContainerInterface $dic): PatientRepository {
        return $dic->get(EntityManager::class)
                   ->getRepository(Patient::class);
    },
    PermissionRepository::class => function (ContainerInterface $dic): PermissionRepository {
        return $dic->get(EntityManager::class)
                   ->getRepository(Permission::class);
    },
    PulseRepository::class => function (ContainerInterface $dic): PulseRepository {
        return $dic->get(EntityManager::class)
                   ->getRepository(Pulse::class);
    },
    RespirationRepository::class => function (ContainerInterface $dic): RespirationRepository {
        return $dic->get(EntityManager::class)
                   ->getRepository(Respiration::class);
    },
    RoleHierarchyRepository::class => function (ContainerInterface $dic): RoleHierarchyRepository {
        return $dic->get(EntityManager::class)
                   ->getRepository(RoleHierarchy::class);
    },
    RolePermissionRepository::class => function (ContainerInterface $dic): RolePermissionRepository {
        return $dic->get(EntityManager::class)
                   ->getRepository(RolePermission::class);
    },
    RoleRepository::class => function (ContainerInterface $dic): RoleRepository {
        return $dic->get(EntityManager::class)
                   ->getRepository(Role::class);
    },
    TemperatureRepository::class => function (ContainerInterface $dic): TemperatureRepository {
        return $dic->get(EntityManager::class)
                   ->getRepository(Temperature::class);
    },
    UnitOfMeasurementRepository::class => function (ContainerInterface $dic): UnitOfMeasurementRepository {
        return $dic->get(EntityManager::class)
                   ->getRepository(UnitOfMeasurement::class);
    },
    UserRepository::class => function (ContainerInterface $dic): UserRepository {
        return $dic->get(EntityManager::class)
                   ->getRepository(User::class);
    },
    UserRoleRepository::class => function (ContainerInterface $dic): UserRoleRepository {
        return $dic->get(EntityManager::class)
                   ->getRepository(UserRole::class);
    },
    VitalSignsRepository::class => function (ContainerInterface $dic): VitalSignsRepository {
        return $dic->get(EntityManager::class)
                   ->getRepository(VitalSigns::class);
    },
    WeightRepository::class => function (ContainerInterface $dic): WeightRepository {
        return $dic->get(EntityManager::class)
                   ->getRepository(Weight::class);
    },
];
