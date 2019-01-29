<?php
declare(strict_types=1);
$settings = [
    'determineRouteBeforeAppMiddleware' => true,
];
if ('cli-server' === PHP_SAPI) {
    $settings['mode'] = 'debug';
    $settings['displayErrorDetails'] = true;
}
