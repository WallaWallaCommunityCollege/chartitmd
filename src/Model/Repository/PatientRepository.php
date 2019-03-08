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
use Doctrine\ORM\NonUniqueResultException;
use Doctrine\ORM\NoResultException;

/**
 * Class PatientRepository.
 */
class PatientRepository extends EntityRepository {
    /**
     * @param string $id
     *
     * @return array
     * @throws NoResultException
     * @throws NonUniqueResultException
     * @throws \InvalidArgumentException
     * @throws \RuntimeException
     */
    public function getPatientByIdAsArray(string $id): array {
        $qb = $this->createQueryBuilder('p');
        /**
         * @var Patient $patient
         */
        $patient =
            $qb->where('p.id = :id')
               ->setParameter('id', $id)
               ->getQuery()
               ->getSingleResult();
        $result = [
            'id' => $patient->getId(),
            'firstName' => $patient->getFirstName(),
            'lastName' => $patient->getLastName(),
            'dob' => $patient->getDateOfBirth()
                             ->format('Y-m-d'),
            'sex' => $patient->getGender()
                             ->getAssignedSex(),
        ];
        return $result;
    }
}
