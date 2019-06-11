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

/**
 * Class UserRepository.
 */
class UserRepository extends EntityRepository {
    use ArrayExceptionCommon;
    /**
     * @param User $user
     */
    public function addUser(User $user) {
        // TODO
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
     *
     * @return User|array|null
     */
    public function getUserById(string $id) {
        $result = null;
        $query = $this->createQueryBuilder('u')
                      ->select('u')
                      ->join('u.gender', 'g')
                      ->join('u.createdBy', 'u')
                      ->where('u.id = :id')
                      ->setParameter('id', $id)
                      ->getQuery();
        try {
            $user = $query->getSingleResult();
        } catch (\Throwable $thrown) {
            return $this->exceptionAsArray($thrown);
        }
        return $user;
    }
    /**
     * @param string $name
     *
     * @return array|null
     * @throws \InvalidArgumentException
     * @throws \RuntimeException
     */
    public function getUserIdByName(string $name): ?array {
        $query = $this->createQueryBuilder('u')
                      ->select('u.id')
                      ->where('u.name = :name')
                      ->setParameter('name', $name)
                      ->getQuery();
        try {
            $user = $query->getSingleResult();
        } catch (\Throwable $thrown) {
            return $this->exceptionAsArray($thrown);
        }
        return $user;
    }
    /** @noinspection MultipleReturnStatementsInspection */
    /**
     * @param array $data
     *
     * @return User|array|null
     */
    public function userLogin(array $data) {
        $result = null;
        $query = $this->createQueryBuilder('u')
                      ->where('u.name = :name')
                      ->setParameter('name', $data['name'])
                      ->getQuery();
        try {
            $user = $query->getSingleResult();
        } catch (\Throwable $thrown) {
            return $this->exceptionAsArray($thrown);
        }
        $hash = $user->getPassword();
        $options = $this->hashOptions ?? null;
        // Verify stored hash against plain-text password
        if (\password_verify($data['password'], $hash)) {
            // Check if a newer hashing algorithm is available
            // or the cost has changed
            /** @noinspection NestedPositiveIfStatementsInspection */
            if (\password_needs_rehash($hash, \PASSWORD_DEFAULT, $options)) {
                // If so, create a new hash, and replace the old one
                $user->setPassword(\password_hash($data['password'], \PASSWORD_DEFAULT, $options));
                try {
                    $this->getEntityManager()
                         ->persist($user);
                } catch (\Throwable $thrown) {
                    return $this->exceptionAsArray($thrown);
                }
            }
            $result = $user;
        }
        return $result;
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
