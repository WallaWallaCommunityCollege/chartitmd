<?php
declare(strict_types=1);
/**
 * Contains class PatientRepository.
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

use ChartItMD\Model\Entity\BloodPressure;
use ChartItMD\Model\Entity\Height;
use ChartItMD\Model\Entity\Patient;
use ChartItMD\Model\Entity\Weight;
use Doctrine\ORM\EntityRepository;

/**
 * Class PatientRepository.
 */
class PatientRepository extends EntityRepository {
    /**
     * @param string $patientId
     *
     * @return array|BloodPressure[]
     */
    public function getLast10BloodPressuresForPatientId(string $patientId): array {
        /**
         * @var BloodPressureRepository $bpr
         */
        $bpr = $this->getEntityManager()
                    ->getRepository(BloodPressure::class);
        return $bpr->getLast10BloodPressuresForPatientId($patientId);
    }
    /**
     * @param string $patientId
     *
     * @return array|Height[]
     */
    public function getLast10HeightsForPatientId(string $patientId): array {
        /**
         * @var HeightRepository $phr
         */
        $phr = $this->getEntityManager()
                    ->getRepository(Height::class);
        return $phr->getLast10HeightsForPatientId($patientId);
    }
    /**
     * @param string $patientId
     *
     * @return array|Weight[]
     */
    public function getLast10WeightsForPatientId(string $patientId): array {
        /**
         * @var WeightRepository $pwr
         */
        $pwr = $this->getEntityManager()
                    ->getRepository(Weight::class);
        return $pwr->getLast10WeightsForPatientId($patientId);
    }
    /**
     * @param string     $id
     * @param array|null $options List of additional patient table data. Valid
     *                            options are:
     *
     *                             * 'recentHeights'
     *                             * 'recentWeights'
     *                             * 'recentBloodPressures'
     *
     * @return array|null
     */
    public function getPatientById(string $id, ?array $options): ?array {
        $result = null;
        $query = $this->createQueryBuilder('p')
                      ->select('p, g, u')
                      ->join('p.gender', 'g')
                      ->join('p.createdBy', 'u')
                      ->where('p.id = :id')
                      ->setParameter('id', $id)
                      ->getQuery();
        try {
            /**
             * @var Patient $patient
             */
            $patient = $query->getSingleResult();
            $result = ['patient' => $patient];
            if (null !== $options) {
                foreach ($options as $option) {
                    switch ($option) {
                        case 'recentBloodPressures':
                            $result[$option] = $this->getLast10BloodPressuresForPatientId($id);
                            break;
                        case 'recentHeights':
                            $result[$option] = $this->getLast10HeightsForPatientId($id);
                            break;
                        case 'recentWeights':
                            $result[$option] = $this->getLast10WeightsForPatientId($id);
                            break;
                        default:
                            break;
                    }
                }
            }
        } catch (\Throwable $e) {
            var_dump($e->getMessage());
            return null;
        }
        return $result;
    }
}
