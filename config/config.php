<?php
declare(strict_types=1);
/**
 * Contains config settings.
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

use function DI\string;

if (!function_exists('ChartItMD\doSubstitutions')) {
    /**
     * @param array $existing
     * @param array $new
     *
     * @return array
     * @throws \InvalidArgumentException
     */
    function doSubstitutions(array $existing, ?array $new = null): array {
        $new = $new ?? $existing;
        $existing['CIM.protected'] = $existing['CIM.protected'] ?? [];
        $additions = array_diff(array_keys($new), $existing['CIM.protected']);
        $depth = 0;
        $maxDepth = 25;
        $regEx = '#(.*?)\{((?:\w+)(?:\.\w+)+)\}(.*)#';
        do {
            $miss = 0;
            foreach ($additions as $addition) {
                if (!is_string($new[$addition])) {
                    continue;
                }
                $matched = preg_match($regEx, $new[$addition], $matches);
                if (1 === $matched) {
                    $sub = $existing[$matches[2]] ?? $new[$matches[2]] ?? $matches[2];
                    $new[$addition] = $matches[1] . $sub . $matches[3];
                    if (fnmatch('*{*.*}*', $new[$addition])) {
                        ++$miss;
                    }
                } elseif (false === $matched) {
                    $constants = array_flip(array_filter(get_defined_constants(),
                        function (string $value) {
                            return fnmatch('PREG_*_ERROR', $value);
                        },
                        ARRAY_FILTER_USE_KEY));
                    $mess = 'Received preg error ' . $constants[preg_last_error()];
                    throw new \InvalidArgumentException($mess);
                }
            }
            if (++$depth > $maxDepth) {
                $mess = 'Exceeded maximum depth, check for possible circular reference(s)';
                throw new \InvalidArgumentException($mess);
            }
        } while (0 < $miss);
        foreach ($additions as $add) {
            $existing[$add] = $new[$add];
        }
        return $existing;
    }
}
$settings = [
    // Needed by potievdev/slim-rbac and possibly other middleware.
    'determineRouteBeforeAppMiddleware' => true,
];
// Automate some debug settings for local developer server.
$settings['mode'] = 'production';
if ('cli-server' === PHP_SAPI) {
    $settings['mode'] = 'debug';
    $settings['displayErrorDetails'] = true;
}
$settings['ChartItMD.baseDir'] = dirname(str_replace('\\', '/', __DIR__)) . '/';
$settings['ChartItMD.configDir'] = string('{ChartItMD.baseDir}config/');
$settings['ChartItMD.publicDir'] = string('{ChartItMD.baseDir}public/');
$settings['ChartItMD.srcDir'] = string('{ChartItMD.baseDir}src/');
$settings['ChartItMD.resourcesDir'] = string('{ChartItMD.baseDir}resources/');
return $settings;

