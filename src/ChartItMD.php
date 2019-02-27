<?php
declare(strict_types=1);
/**
 * Contains class ChartItMD.
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

namespace ChartItMD;

use DI\Bridge\Slim\App;
use DI\ContainerBuilder;

/**
 * Class ChartItMD.
 */
class ChartItMD extends App {
    /**
     * @param ContainerBuilder $builder
     *
     * @throws \InvalidArgumentException
     * @throws \LogicException
     */
    protected function configureContainer(ContainerBuilder $builder): void {
        $builder->addDefinitions(dirname(__DIR__) . '/config/config.php')
                ->addDefinitions(dirname(__DIR__) . '/config/dot_env.php')
                ->addDefinitions(dirname(__DIR__) . '/config/pdo.php')
                ->addDefinitions(dirname(__DIR__) . '/config/doctrine.php');
    }
}
