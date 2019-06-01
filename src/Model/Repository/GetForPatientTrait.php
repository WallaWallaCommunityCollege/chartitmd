<?php
/** @noinspection PhpUndefinedMethodInspection */
declare(strict_types=1);
/**
 * Contains trait GetForPatientTrait.
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

namespace ChartItMD\Model\Repository;

/**
 * Trait GetForPatientTrait.
 */
trait GetForPatientTrait {
    /**
     * @param string $patientId
     *
     * @return array|null
     */
    public function getForPatientId(string $patientId): ?array {
        $query = $this->createQueryBuilder('x')
                      ->where('x.patient = :id')
                      ->setParameter('id', $patientId)
                      ->getQuery();
        try {
            $result = $query->getResult();
        } catch (\Throwable $e) {
            return $this->exceptionAsArray($e);
        }
        return $result;
    }
    /**
     * @param string $patientId
     *
     * @return array|null
     */
    public function getMeasurementsForPatientId(string $patientId): ?array {
        $query = $this->createQueryBuilder('x')
                      ->where('x.patient = :id')
                      ->setParameter('id', $patientId)
                      ->getQuery();
        try {
            $result = $query->getResult();
        } catch (\Throwable $e) {
            return $this->exceptionAsArray($e);
        }
        return $result;
    }
}
