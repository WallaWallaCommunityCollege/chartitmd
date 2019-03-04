<?php
declare(strict_types=1);
/**
 * Contains update change log script.
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
include_once dirname(__DIR__) . '/bootstrap.php';

use GitChangeLogCreator\GitChangeLogCreator;

try {
    $git = new GitChangeLogCreator();
    $git->getTags()
        ->getLogs()
        ->contentGenerator()
        ->fileGenerate();
} catch (Exception $e) {
    echo $e->getMessage();
}
