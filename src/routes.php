<?php
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
use Psr\Container\ContainerInterface;
use Slim\Http\Request;
use Slim\Http\Response;

/**
 * @var ChartItMD $app
 */
$app->group(
    '/patient/',
    function () use ($app) {
        $app->get(
            '{id}',
            function (Request $request, Response $response, $id) use ($app) {
                /**
                 * @var ContainerInterface $dic
                 */
                $dic = $app->getContainer();
                $patient =
                    $dic->get(PatientRepository::class)
                        ->getPatientById($id, ['recentBloodPressures', 'recentHeights', 'recentWeights']);
                return $response->withJson($patient, 200);
            }
        );
    }
);
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
$app->get(
    '/users',
    function (Request $request, Response $response) use ($app) {
        /**
         * @var ContainerInterface $dic
         */
        $dic = $app->getContainer();
        $users =
            $dic->get(UserRepository::class)
                ->getAllUsers();
        return $response->withJson($users);
    }
);
$app->get(
  '/vitalsigns/{id}',
    function (Request $request, Response $response, $id) use ($app) {
        /**
         * @var ContainerInterface $dic
         */
        $dic = $app->getContainer();
        $vitalSigns =
            $dic->get(VitalSignsRepository::class)
                ->getVitalSignsById($id);
        return $response->withJson($vitalSigns, 200);
    });
$app->get(
    '/',
    function (Request $request, Response $response, array $args) {
        $response->getBody()
                 ->write('I have no root route');
        return $response;
    }
);
