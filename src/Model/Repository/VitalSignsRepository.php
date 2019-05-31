<?php
declare(strict_types=1);
/**
 * Contains class VitalSignsRepository.
 *
 * PHP version 7.2+
 *
 *
 * LICENSE:
 * This file is part of ChartItMD.
 * Copyright (C) 2019 ChartItMD Development Group
 *
 * @author    Alec Aichele <aichelealec@gmail.com>
 * @author    Michael Cummings <mgcummings@yahoo.com>
 * @copyright 2019 ChartItMD Development Group
 * @license   Proprietary
 */

namespace ChartItMD\Model\Repository;

use ChartItMD\Model\Entity\VitalSigns;
use Doctrine\ORM\EntityRepository;

/**
 * Class VitalSignsRepository.
 *
 */
class VitalSignsRepository extends EntityRepository {
    use ArrayExceptionCommon;
    /**
     * @param string $id
     *
     * @return VitalSigns|array|null
     */
    public function getVitalSignsById(string $id) {
        $result = null;
        $query = $this->createQueryBuilder('v')
                      ->select('v')
                      ->where('v.id = :id')
                      ->setParameter('id', $id)
                      ->getQuery();
        try {
            $result = $query->getSingleResult();
        } catch (\Throwable $e) {
            return $this->exceptionAsArray($e);
        }
        return $result;
    }
    /**
     * @param string $patientId
     *
     * @return array
     */
    public function getLast10VitalSignsForPatientId(string $patientId): array {
        $query = $this->createQueryBuilder('v')
                      ->where('v.patient = :id')
                      ->join('v.oxygenLocation', 'ol')
                      ->join('v.painLocation', 'pl')
                      ->join('v.temperatureMethod', 'tm')
                      ->join('v.createdBy', 'u')
                      ->setMaxResults(10)
                      ->setParameter('id', $patientId)
                      ->getQuery();
        try {
            $vss = $query->getArrayResult();
            foreach ($vss as &$vs) {
                unset($vs['patient']);
            }
        } catch (\Throwable $e) {
            return $this->exceptionAsArray($e);
        }
        return $vss;
    }
}
