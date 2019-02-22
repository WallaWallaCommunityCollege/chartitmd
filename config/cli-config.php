<?php
declare(strict_types=1);
/**
 * Contains helper for Doctrine cli tool.
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

use Doctrine\ORM\Tools\Console\ConsoleRunner;

$entityManager = require __DIR__ . '/entity_manager.php';
return ConsoleRunner::createHelperSet($entityManager);
