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

use ChartItMD\Model\Entity\PatientHeight;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\NonUniqueResultException;

/**
 * Class PatientHeightRepository.
 */
class PatientHeightRepository extends EntityRepository {
    /**
     * @param string $id
     *
     * @return PatientHeight|null
     * @throws NonUniqueResultException
     * @throws \InvalidArgumentException
     * @throws \RuntimeException
     */
    public function getLatestHeightByPatientId(string $id): ?PatientHeight {
        $height =
            $this->createQueryBuilder('h')
                 ->where('h.patient = :id')
                 ->setParameter('id', $id)
                 ->orderBy('h.createdAt', 'DESC')
                 ->setMaxResults(1)
                 ->getQuery()
                 ->getOneOrNullResult();
        return $height;
    }
}
