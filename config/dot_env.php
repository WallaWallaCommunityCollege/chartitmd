<?php
declare(strict_types=1);

/**
 * Contains dot_env settings.
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

use josegonzalez\Dotenv\Loader;
use Psr\Container\ContainerInterface;
use function DI\string;

/**
 * Settings for dot env which allows importing per user, server, or whatever environment variables etc.
 *
 * @var array $dotEnv
 */
$dotEnv = [
    'ChartItMD.DotEnv.Parameters.filePaths' => [string('{ChartItMD.baseDir}.env')],
    Loader::class => function (ContainerInterface $dic): Loader {
        /** @var Loader $loader */
        $loader = new Loader($dic->get('ChartItMD.DotEnv.Parameters.filePaths'));
        $loader->parse()
               ->toEnv()
               ->putenv();
        return $loader;
    }
];
return $dotEnv;
