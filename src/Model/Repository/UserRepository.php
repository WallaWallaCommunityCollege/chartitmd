<?php
declare(strict_types=1);
/**
 * Contains class UserRepository.
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

use Doctrine\ORM\EntityRepository;

/**
 * Class UserRepository.
 */
class UserRepository extends EntityRepository {
    /**
     * @param string $name
     *
     * @return string|null
     * @throws \InvalidArgumentException
     * @throws \RuntimeException
     */
    public function getUserIdByName(string $name): ?string {
        $qb = $this->createQueryBuilder('user');
        $result =
            $qb->select('user.id')
               ->where(
                   $qb->expr()
                      ->eq(
                          'user.name',
                          $qb->expr()
                             ->literal($name)
                      )
               )
               ->setMaxResults(1)
               ->getQuery()
               ->getArrayResult();
        return 0 < count($result) ? $result[0]['id'] : null;
    }
    /**
     * @return array
     * @throws \InvalidArgumentException
     * @throws \RuntimeException
     */
    public function getAllUsers(): array {
        $qb = $this->createQueryBuilder('user');
        return $qb->select('user')
                  ->getQuery()
                  ->getArrayResult();
    }
}
