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

use ChartItMD\Model\Entity\Patient;
use Doctrine\ORM\EntityRepository;

/**
 * Class PatientRepository.
 */
class PatientRepository extends EntityRepository {
    use ArrayExceptionCommon;
    /**
     * @param string $id
     *
     * @return Patient|array|null
     */
    public function getById(string $id) {
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
            $result = $patient;
        } catch (\Throwable $thrown) {
            return $this->exceptionAsArray($thrown);
        }
        return $result;
    }
    /**
     * @param string     $patientId
     * @param array|null $list
     *
     * @return array|null
     */
    public function getVitalSignsForPatientId(string $patientId, ?array $list = null): ?array {
        $items = $list ?? ['Diastolic', 'OxygenSaturation', 'Pain', 'Pulse', 'Respiration', 'Systolic', 'Temperature'];
        $result = [];
        $base = \dirname(self::class, 2);
        foreach ($items as $item) {
            /**
             * @var GetForPatientInterface $repo
             */
            $repo = $this->getEntityManager()
                         ->getRepository($base . '\Entity\\' . $item);
            try {
                $result[\strtolower($item)] = $repo->getMeasurementsForPatientId($patientId);
            } catch (\Throwable $thrown) {
                return $this->exceptionAsArray($thrown);
            }
        }
        return $result;
    }
}
