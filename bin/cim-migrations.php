<?php
declare(strict_types=1);
/**
 * Contains cim-migrations cli tool..
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
use Doctrine\DBAL\Tools\Console\Helper\ConnectionHelper;
use Doctrine\Migrations\Configuration\Configuration;
use Doctrine\Migrations\Tools\Console\Command;
use Doctrine\Migrations\Tools\Console\Helper\ConfigurationHelper;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Tools\Console\Helper\EntityManagerHelper;
use josegonzalez\Dotenv\Loader;
use Symfony\Component\Console\Application;
use Symfony\Component\Console\Exception\LogicException as SLogicException;
use Symfony\Component\Console\Helper\HelperSet;
use Symfony\Component\Console\Helper\QuestionHelper;

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
    $conn = $dic->get('ChartItMD.Doctrine.MConnection');
    $config = $dic->get(Configuration::class);
    $entityManager = $dic->get(EntityManagerInterface::class);
    $name = $dic->get('ChartItMD.Doctrine.Parameters.migrationsName');
    $version = $dic->get('ChartItMD.Doctrine.Parameters.migrationsVersion');
} catch (Exception $e) {
    print $e->getTraceAsString();
    print $e->getMessage();
    exit(1);
}
$helperSet = new HelperSet();
$helperSet->set(new QuestionHelper(), 'question');
$helperSet->set(new ConnectionHelper($conn), 'db');
$helperSet->set(new EntityManagerHelper($entityManager), 'em');
$helperSet->set(new ConfigurationHelper($conn, $config));
$cli = new Application($name, $version);
$cli->setCatchExceptions(true);
$cli->setHelperSet($helperSet);
try {
    $cli->addCommands(
        [
            new Command\DiffCommand(),
            new Command\DumpSchemaCommand(),
            new Command\ExecuteCommand(),
            new Command\GenerateCommand(),
            new Command\LatestCommand(),
            new Command\MigrateCommand(),
            new Command\RollupCommand(),
            new Command\StatusCommand(),
            new Command\UpToDateCommand(),
            new Command\VersionCommand(),
        ]
    );
} catch (SLogicException $e) {
    print $e->getTraceAsString();
    print $e->getMessage();
    exit(2);
}
try {
    $cli->run();
} catch (Exception $e) {
    print $e->getTraceAsString();
    print $e->getMessage();
    exit(3);
}
