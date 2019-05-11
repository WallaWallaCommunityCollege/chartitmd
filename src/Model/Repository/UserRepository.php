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

use ChartItMD\Model\Entity\User;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\ORMException;

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
        $result = $qb->select('user.id')
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
        return 0 < \count($result) ? $result[0]['id'] : null;
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
    /**
     * @param string $id
     */
    public function getUserById(string $id) {
        $result = null;
        $query = $this->createQueryBuilder('u')
                      ->select('u')
                      ->join('p.gender', 'g')
                      ->join('p.createdBy', 'u')
                      ->where('p.id = :id')
                      ->setParameter('id', $id)
                      ->getQuery();
    }
    /**
     * @param array $data
     *
     * @return User|null
     */
    public function userLogin(array $data): ?User {
        $result = null;
        $query = $this->createQueryBuilder('u')
                      ->select('u')
                      ->where('u.name = :name')
                      ->setParameter('name', $data['name'])
                      ->getQuery();
        try {
            /**
             * @var User $user
             */
            $user = $query->getSingleResult();
        } catch (\Throwable $e) {
            var_dump($e->getMessage());
            return null;
        }
        $hash = $user->getPassword();
        $options = $this->hashOptions ?? null;
        // Verify stored hash against plain-text password
        if (\password_verify($data['password'], $hash)) {
            // Check if a newer hashing algorithm is available
            // or the cost has changed
            if (\password_needs_rehash($hash, \PASSWORD_DEFAULT, $options)) {
                // If so, create a new hash, and replace the old one
                $user->setPassword(\password_hash($data['password'], \PASSWORD_DEFAULT, $options));
                try {
                    $this->getEntityManager()
                         ->persist($user);
                } catch (ORMException $e) {
                    var_dump($e->getMessage());
                    return null;
                }
            }
            $result = $user;
        }
        return $result;
    }
    /**
     * @param User $user
     */
    public function addUser(User $user) {
        // TODO
    }
    /**
     * Per hash algorithm options.
     *
     * NOTE: Will need to be update if the default algorithm changes. Assumes PASSWORD_BCRYPT
     *
     * @var array
     */
    private $hashOptions = ['cost' => 12];
}
