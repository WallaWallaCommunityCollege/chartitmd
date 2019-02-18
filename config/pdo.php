<?php
declare(strict_types=1);

/**
 * Contains pdo settings.
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
use Psr\Container\ContainerInterface;
use function DI\env;
use function DI\string;

$init = <<<'SQL'
SET SESSION SQL_MODE = 'ANSI,TRADITIONAL';
SET SESSION TRANSACTION ISOLATION LEVEL SERIALIZABLE;
SET SESSION TIME_ZONE = '+00:00';
SET NAMES '{ChartItMD.Pdo.Parameters.characterSet}' COLLATE '{ChartItMD.Pdo.Parameters.characterCollate}';
SET COLLATION_CONNECTION = '{ChartItMD.Pdo.Parameters.characterCollate}';
SET DEFAULT_STORAGE_ENGINE = '{ChartItMD.Pdo.Parameters.engine}';
SQL;
$pdo = [
    'ChartItMD.Pdo.Parameters.characterCollate' => 'utf8mb4_unicode_520_ci',
    'ChartItMD.Pdo.Parameters.characterSet' => 'utf8mb4',
    'ChartItMD.Pdo.Parameters.database' => env('PDO_DB', 'chartitmd'),
    'ChartItMD.Pdo.Parameters.engine' => 'InnoDB',
    'ChartItMD.Pdo.Parameters.hostName' => env('PDO_HOST', 'localhost'),
    'ChartItMD.Pdo.Parameters.dsn' => string('mysql:host={ChartItMD.Pdo.Parameters.hostName};'
        . 'charset={ChartItMD.Pdo.Parameters.characterSet}'),
    'ChartItMD.Pdo.Parameters.initialization' => string($init),
    'ChartItMD.Pdo.Parameters.platform' => 'mysql',
    'ChartItMD.Pdo.Parameters.username' => env('PDO_USERNAME', 'CIMUser'),
    'ChartItMD.Pdo.Parameters.password' => env('PDO_PASSWORD', 'secret'),
    Connection::class => function (ContainerInterface $dic): Connection {
        $params = [
            $dic->get('ChartItMD.Pdo.Parameters.dsn'),
            $dic->get('ChartItMD.Pdo.Parameters.username'),
            $dic->get('ChartItMD.Pdo.Parameters.password')
        ];
        $conn = new Connection(...$params);
        $conn->exec((string)$dic->get('ChartItMD.Pdo.Parameters.initialization'));
        $conn->setSql92Mode();
        return $conn;
    }
];
return $pdo;
