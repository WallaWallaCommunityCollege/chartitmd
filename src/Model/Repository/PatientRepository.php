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
use ChartItMD\Model\Entity\Patient;
use ChartItMD\Model\Entity\PatientHeight;
use ChartItMD\Model\Entity\PatientWeight;
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
        $bpr =
            $this->getEntityManager()
                 ->getRepository(BloodPressure::class);
        return $bpr->getLast10BloodPressuresForPatientId($patientId);
    }
    /**
     * @param string $patientId
     *
     * @return array|PatientHeight[]
     */
    public function getLast10HeightsForPatientId(string $patientId): array {
        /**
         * @var PatientHeightRepository $phr
         */
        $phr =
            $this->getEntityManager()
                 ->getRepository(PatientHeight::class);
        return $phr->getLast10HeightsForPatientId($patientId);
    }
    /**
     * @param string $patientId
     *
     * @return array|PatientWeight[]
     */
    public function getLast10WeightsForPatientId(string $patientId): array {
        /**
         * @var PatientWeightRepository $pwr
         */
        $pwr =
            $this->getEntityManager()
                 ->getRepository(PatientWeight::class);
        return $pwr->getLast10WeightsForPatientId($patientId);
    }
    /**
     * @param string $id
     * @param array  $options List of additional patient table data. Valid
     *                        options are:
     *
     *                           * 'recentHeights'
     *                           * 'recentWeights'
     *                           * 'recentBloodPressures'
     *
     * @return array|null
     */
    public function getPatientById(string $id, array $options = []): ?array {
        $result = null;
        try {
            $qb = $this->createQueryBuilder('p');
            /**
             * @var Patient $patient
             */
            $patient =
                $qb->select('p, g, u')
                   ->join('p.gender', 'g')
                   ->join('p.createdBy', 'u')
                   ->where('p.id = :id')
                   ->setParameter('id', $id)
                   ->getQuery()
                   ->getSingleResult();
            $result = ['patient' => $patient];
            if (!empty($options)) {
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
