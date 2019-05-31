<?php
declare(strict_types=1);
/**
 * Contains class HeightRepository.
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

use ChartItMD\Model\Entity\Height;
use ChartItMD\Model\Entity\Patient;
use Doctrine\ORM\EntityRepository;

/**
 * Class HeightRepository.
 */
class HeightRepository extends EntityRepository implements GetForPatientInterface {
    use GetForPatientTrait;
    /**
     * @param Patient $patient
     *
     * @return Height[]
     */
    public function getAllHeightsForPatient(Patient $patient): array {
        $query = $this->createQueryBuilder('h')
                      ->where('h.patientId = :id')
                      ->setParameter('id', $patient->getId())
                      ->orderBy('h.createdAt', 'DESC')
                      ->getQuery();
        try {
            $heights = $query->getArrayResult();
        } catch (\Throwable $e) {
            var_dump($e->getMessage());
            return [];
        }
        return $heights;
    }
    /**
     * @param string $patientId
     *
     * @return array
     */
    public function getLast10HeightsForPatientId(string $patientId): array {
        $query = $this->createQueryBuilder('h')
                      ->where('h.patient = :id')
                      ->setParameter('id', $patientId)
                      ->setMaxResults(10)
                      ->getQuery();
        try {
            $heights = $query->getArrayResult();
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
     * @return Height|null
     */
    public function getLatestHeightByPatientId(string $id): ?Height {
        $query = $this->createQueryBuilder('h')
                      ->where('h.patient = :id')
                      ->setParameter('id', $id)
                      ->orderBy('h.createdAt', 'DESC')
                      ->getQuery();
        try {
            $height = $query->getOneOrNullResult();
        } catch (\Throwable $e) {
            var_dump($e->getMessage());
            return null;
        }
        return $height;
    }
    /**
     * @param string $id
     *
     * @return Height|null
     */
    public function getPatientHeightsById(string $id): ?Height {
        $query = $this->createQueryBuilder('h')
                      ->where('h.id = :id')
                      ->setParameter('id', $id)
                      ->getQuery();
        try {
            /**
             * @var ?PatientHeight $height
             */
            $height = $query->getOneOrNullResult();
        } catch (\Throwable $e) {
            var_dump($e->getMessage());
            return null;
        }
        return $height;
    }
}
