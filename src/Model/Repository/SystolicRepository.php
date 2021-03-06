<?php
declare(strict_types=1);
/**
 * Contains class SystolicRepository.
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

use Doctrine\ORM\EntityRepository;

/**
 * Class SystolicRepository.
 */
class SystolicRepository extends EntityRepository implements GetForPatientInterface {
    use GetForPatientTrait;
    use ArrayExceptionCommon;
    /**
     * @param string $id
     *
     * @return array|null
     */
    public function getById(string $id): ?array {
        $query = $this->createQueryBuilder('b')
                      ->select('b')
                      ->where('b.id = :id')
                      ->setParameter('id', $id)
                      ->getQuery();
        try {
            $result = $query->getOneOrNullResult();
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
    public function getLast10ForPatientId(string $patientId): ?array {
        $query = $this->createQueryBuilder('b')
                      ->select('b')
                      ->where('b.patient = :id')
                      ->setParameter('id', $patientId)
                      ->setMaxResults(10)
                      ->getQuery();
        try {
            $result = $query->getResult();
        } catch (\Throwable $e) {
            return $this->exceptionAsArray($e);
        }
        return $result;
    }
}
