<?php
declare(strict_types=1);
/**
 * Contains class PatientHeightRepository.
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

use ChartItMD\Model\Entity\Patient;
use ChartItMD\Model\Entity\PatientHeight;
use Doctrine\ORM\EntityRepository;

/**
 * Class PatientHeightRepository.
 */
class PatientHeightRepository extends EntityRepository {
    /**
     * @param string $patientId
     *
     * @return array|PatientHeight[]
     */
    public function getAllHeightsByPatientId(string $patientId): array {
        try {
            $qb = $this->createQueryBuilder('h');
            $heights =
                $qb->where('h.patientId = :id')
                   ->setParameter('id', $patientId)
                   ->orderBy('h.createdAt', 'DESC')
                   ->getQuery()
                   ->getArrayResult();
        } catch (\Throwable $e) {
            var_dump($e->getMessage());
            return [];
        }
        return $heights;
    }
    /**
     * @param Patient $patient
     *
     * @return PatientHeight[]
     */
    public function getAllHeightsForPatient(Patient $patient): array {
        try {
            $qb = $this->createQueryBuilder('h');
            $heights =
                $qb->where('h.patientId = :id')
                   ->setParameter('id', $patient->getId())
                   ->orderBy('h.createdAt', 'DESC')
                   ->getQuery()
                   ->getArrayResult();
        } catch (\Throwable $e) {
            var_dump($e->getMessage());
            return [];
        }
        return $heights;
    }
    public function getLast10HeightsForPatientId(string $patientId) {
        try {
            $qb = $this->createQueryBuilder('h');
            $heights =
                $qb->where('h.patient = :id')
                   ->setParameter('id', $patientId)
                   ->setMaxResults(10)
                   ->getQuery()
                   ->getArrayResult();
            foreach ($heights as &$height) {
                unset($height['patient']);
            }
        } catch (\Throwable $e) {
            var_dump($e->getMessage());
            return [];
        }
        return $heights;
    }
    /**
     * @param string $id
     *
     * @return PatientHeight|null
     */
    public function getLatestHeightByPatientId(string $id): ?PatientHeight {
        try {
            $height =
                $this->createQueryBuilder('h')
                     ->where('h.patient = :id')
                     ->setParameter('id', $id)
                     ->orderBy('h.createdAt', 'DESC')
                     ->getQuery()
                     ->getOneOrNullResult();
        } catch (\Throwable $e) {
            var_dump($e->getMessage());
            return null;
        }
        return $height;
    }
    /**
     * @param string $id
     *
     * @return PatientHeight|null
     */
    public function getPatientHeightsById(string $id): ?PatientHeight {
        try {
            $qb = $this->createQueryBuilder('h');
            /**
             * @var ?PatientHeight $height
             */
            $height =
                $qb->where('h.id = :id')
                   ->setParameter('id', $id)
                   ->getQuery()
                   ->getOneOrNullResult();
        } catch (\Throwable $e) {
            var_dump($e->getMessage());
            return null;
        }
        return $height;
    }
}
