<?php
declare(strict_types=1);
/**
 * Contains config settings.
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

namespace ChartItMD;

use function DI\string;

/**
 * Settings of a general, common, or application way that are used in multiple places.
 *
 * @var array $settings
 */
$settings = [
    // Needed by potievdev/slim-rbac and possibly other middleware.
    'determineRouteBeforeAppMiddleware' => true,
    'mode' => 'production',
    // Converts directory to *nix style '/' since they work everywhere in PHP.
    'ChartItMD.baseDir' => dirname(str_replace('\\', '/', __DIR__)) . '/',
    'ChartItMD.configDir' => string('{ChartItMD.baseDir}config/'),
    'ChartItMD.publicDir' => string('{ChartItMD.baseDir}public/'),
    'ChartItMD.srcDir' => string('{ChartItMD.baseDir}src/'),
    'ChartItMD.resourcesDir' => string('{ChartItMD.baseDir}resources/')
];
// Automate some debug settings for local developer server.
if ('cli-server' === PHP_SAPI) {
    $settings['mode'] = 'debug';
    $settings['displayErrorDetails'] = true;
}
return $settings;

