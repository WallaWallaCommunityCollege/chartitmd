<?php
/** @noinspection PhpUnusedParameterInspection */
declare(strict_types=1);
/**
 * Contains routes.
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

use ChartItMD\Model\Repository\PatientRepository;
use ChartItMD\Model\Repository\UserRepository;
use ChartItMD\Model\Repository\VitalSignsRepository;
use Interop\Container\Exception\ContainerException;
use Psr\Container\ContainerInterface;
use Slim\Http\Request;
use Slim\Http\Response;

/**
 * @var ChartItMD $app
 */
/** @noinspection BadExceptionsProcessingInspection */
try {
    $app->group(
        '/patient/',
        function () use ($app) {
            $app->get(
                '{id}',
                function (Request $request, Response $response, string $id) use ($app) {
                    /**
                     * @var ContainerInterface $dic
                     */
                    $dic = $app->getContainer();
                    try {
                        $patient = $dic->get(PatientRepository::class)
                                       ->getById($id);
                    } catch (\Throwable $thrown) {
                        $patient = [
                            'error' => [
                                'message' => $thrown->getMessage(),
                                'code' => $thrown->getCode(),
                                'file' => $thrown->getFile(),
                                'line' => $thrown->getLine(),
                                'trace' => $thrown->getTrace(),
                            ],
                        ];
                    }
                    return $response->withJson($patient, 200);
                }
            );
            $app->get(
                'vitalSigns/{id}',
                function (Request $request, Response $response, string $id) use ($app) {
                    /**
                     * @var ContainerInterface $dic
                     */
                    $dic = $app->getContainer();
                    try {
                        $vitalSigns = $dic->get(VitalSignsRepository::class)
                                          ->getForPatientId($id);
                        //$vitalSigns = $dic->get(PatientRepository::class)
                        //                  ->getVitalSignsForPatientId($id);
                    } catch (\Throwable $thrown) {
                        $vitalSigns = [
                            'error' => [
                                'message' => $thrown->getMessage(),
                                'code' => $thrown->getCode(),
                                'file' => $thrown->getFile(),
                                'line' => $thrown->getLine(),
                                'trace' => $thrown->getTrace(),
                            ],
                        ];
                    }
                    return $response->withJson($vitalSigns, 200);
                }
            );
        }
    );
    // TODO: need to get actual patients from DB.
    $app->get(
        '/patients',
        function (Request $request, Response $response) {
            $patient = [
                '24aI_rQW920b2e8GxfY5wu' => [
                    'firstName' => 'Lillian',
                    'lastName' => 'Wald',
                    'dateOfBirth' => '1940-05-01',
                    'gender' => 'female',
                    'height' => '157.5',
                    'weight' => '70.5',
                    'uri' => $request->getRequestTarget(),
                ],
                '0pJFkgP#B0_87VSGDNIf2V' => [
                    'firstName' => 'Lillian',
                    'lastName' => 'Wald',
                    'dateOfBirth' => '1940-05-01',
                    'gender' => 'female',
                    'height' => '157.5',
                    'weight' => '70.5',
                    'uri' => $request->getRequestTarget(),
                ],
            ];
            return $response->withJson($patient, 200);
        }
    );
    $app->group(
        '/user',
        function () use ($app) {
            $app->post(
                '/login',
                function (Request $request, Response $response) use ($app) {
                    /**
                     * @var ContainerInterface $dic
                     */
                    $dic = $app->getContainer();
                    $user = \json_decode($request->getParsedBody()['user'], true);
                    //return $response->withJson($user, 200);
                    $result = null;
                    if (null !== $user) {
                        $result = $dic->get(UserRepository::class)
                                      ->userLogin($user);
                        if (null !== $result) {
                            return $response->withJson($result, 200);
                        }
                    }
                    return $response->withJson(null, 401);
                }
            );
            $app->get(
                '/{name}',
                function (Request $request, Response $response, $name) use ($app) {
                    /**
                     * @var ContainerInterface $dic
                     */
                    $dic = $app->getContainer();
                    $id = $dic->get(UserRepository::class)
                              ->getUserIdByName($name);
//                $user =
                    return $response->withJson($id, 200);
                }
            );
        }
    );
    $app->get(
        '/users',
        function (Request $request, Response $response) use ($app) {
            /**
             * @var ContainerInterface $dic
             */
            $dic = $app->getContainer();
            $users = $dic->get(UserRepository::class)
                         ->getAllUsers();
            return $response->withJson($users);
        }
    );
    $app->get(
        '/vitalSigns/{id}',
        function (Request $request, Response $response, string $id) use ($app) {
            /**
             * @var ContainerInterface $dic
             */
            $dic = $app->getContainer();
            $vitalSigns = $dic->get(VitalSignsRepository::class)
                              ->getVitalSignsById($id);
            return $response->withJson($vitalSigns, 200);
        }
    );
    $app->get(
        '/',
        function (Request $request, Response $response, array $args) {
            $response->getBody()
                     ->write('I have no root route');
            return $response;
        }
    );
} catch (\Throwable | ContainerException $thrown) {
    $error = [
        'error' => [
            'message' => $thrown->getMessage(),
            'code' => $thrown->getCode(),
            'file' => $thrown->getFile(),
            'line' => $thrown->getLine(),
            'trace' => $thrown->getTrace(),
        ],
    ];
    return (new Response())->withJson($error, 200);
}
