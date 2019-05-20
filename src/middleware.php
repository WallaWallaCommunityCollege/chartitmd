<?php
declare(strict_types=1);
/**
 * Contains middleware.
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

use Slim\Http\Request;
use Slim\Http\Response;

/**
 * @var ChartItMD $app
 */
$app->add(
    function (Request $request, Response $response, callable $next) {
        $uri = $request->getUri();
        $path = $uri->getPath();
        if ('/' !== $path && '/' === \substr($path, -1)) {
            // permanently redirect paths with a trailing slash
            // to their non-trailing counterpart
            $uri = $uri->withPath(\substr($path, 0, -1));
            if ('GET' === $request->getMethod()) {
                return $response->withRedirect((string)$uri, 301);
            }
            return $next($request->withUri($uri), $response);
        }
        return $next($request, $response);
    }
);
