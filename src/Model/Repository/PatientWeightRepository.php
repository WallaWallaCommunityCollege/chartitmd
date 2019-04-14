<?php
declare(strict_types=1);
/**
 * Contains class PatientWeightRepository.
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

use ChartItMD\Model\Entity\PatientWeight;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\NonUniqueResultException;
/**
 * Class PatientWeightRepository.
 */
class PatientWeightRepository extends EntityRepository {
    /**
     * @param string $patientId
     *
     * @return array
     */
    public function getLast10WeightsForPatientId(string $patientId): array {
        $query = $this->createQueryBuilder('w')
                      ->where('w.patient = :id')
                      ->setParameter('id', $patientId)
                      ->setMaxResults(10)
                      ->getQuery();
        try {
            $weights = $query->getArrayResult();
            foreach ($weights as &$weight) {
                unset($weight['patient']);
            }
        } catch (\Throwable $e) {
            var_dump($e->getMessage());
            return [];
        }
        return $weights;
    }
    /**
     * @param string $id
     *
     * @return PatientWeight|null
     * @throws NonUniqueResultException
     * @throws \InvalidArgumentException
     * @throws \RuntimeException
     */
    public function getLatestWeightByPatientId(string $id): ?PatientWeight {
        $query = $this->createQueryBuilder('h')
                      ->where('h.patient = :id')
                      ->setParameter('id', $id)
                      ->orderBy('h.createdAt', 'DESC')
                      ->setMaxResults(1)
                      ->getQuery();
        $weight = $query->getOneOrNullResult();
        return $weight;
    }
}
