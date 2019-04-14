<?php
declare(strict_types=1);
/**
 * Contains class GenderRepository.
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

use ChartItMD\Model\Entity\Gender;
use Doctrine\ORM\EntityRepository;
/**
 * Class GenderRepository.
 */
class GenderRepository extends EntityRepository {
    /**
     * @param string $id
     *
     * @return Gender|null
     */
    public function getGenderById(string $id): ?Gender {
        try {
            $qb = $this->createQueryBuilder('g');
            $gender =
                $qb->where('g.id= :id')
                   ->setParameter('id', $id)
                   ->getQuery()
                   ->getSingleResult();
        } catch (\Throwable $e) {
            var_dump($e->getMessage());
            return null;
        }
        return $gender;
    }
}
