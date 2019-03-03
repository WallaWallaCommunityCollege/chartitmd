<?php
declare(strict_types=1);
/**
 * Contains class AuthMiddleware.
 *
 * PHP version 7.2+
 *
 * LICENSE:
 * This file is part of ChartItMD.
 * Copyright (C) 2019 ChartItMD Development Group
 *
 * Additional code from {@link https://github.com/potievdev/slim-rbac} with MIT
 * license by Abdulmalik Abdulpotiev.
 *
 * @see       MIT_LICENSE
 * @author    Abdulmalik Abdulpotiev <potievdev@gmail.com>
 *
 * @author    Michael Cummings <mgcummings@yahoo.com>
 * @copyright 2019 ChartItMD Development Group
 * @license   Proprietary
 */

namespace ChartItMD\Component;

use ChartItMD\Structure\AuthOptions;
use Doctrine\ORM\Query\QueryException;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

/**
 * Checking Access Middleware
 * Class AuthMiddleware
 *
 * @package ChartItMD\Component
 */
class AuthMiddleware extends BaseComponent {
    /**
     * Check access
     *
     * @param ServerRequestInterface $request  PSR7 request
     * @param ResponseInterface      $response PSR7 response
     * @param callable               $next     Next middleware
     *
     * @return ResponseInterface
     * @throws QueryException
     * @throws \InvalidArgumentException
     * @throws \RuntimeException
     */
    public function __invoke(ServerRequestInterface $request,
        ResponseInterface $response,
        callable $next): ResponseInterface {
        $variableName = $this->authOptions->getVariableName();
        $storageType = $this->authOptions->getVariableStorageType();
        $userId = (string)$request->getAttribute($variableName);
        switch ($storageType) {
            case AuthOptions::HEADER_STORAGE_TYPE:
                $userId = (string)$request->getHeaderLine($variableName);
                break;
            case AuthOptions::COOKIE_STORAGE_TYPE:
                $params = $request->getCookieParams();
                $userId = (string)$params[$variableName];
                break;
        }
        $permissionName =
            $request->getUri()
                    ->getPath();
        $permitted = $this->checkAccess($userId, $permissionName);
        $response = false === $permitted ? $response->withStatus(403, 'Permission denied') : $next($request, $response);
        return $response;
    }
}
