<?php
declare(strict_types=1);
/**
 * Contains class AuthManager.
 *
 * PHP version 7.2+
 *
 * LICENSE:
 * This file is part of ChartItMD.
 * Copyright (C) 2019 ChartItMD Development Group
 *
 * Additional code from {@link https://github.com/potievdev/slim-rbac} with MIT
 * license by Abdulmalik Abdulpotiev.
 *
 * @see       MIT_LICENSE
 * @author    Abdulmalik Abdulpotiev <potievdev@gmail.com>
 *
 * @author    Michael Cummings <mgcummings@yahoo.com>
 * @copyright 2019 ChartItMD Development Group
 * @license   Proprietary
 */

namespace ChartItMD\Component;

use ChartItMD\Exception\CyclicException;
use ChartItMD\Exception\DatabaseException;
use ChartItMD\Model\Entity\Permission;
use ChartItMD\Model\Entity\Role;
use ChartItMD\Model\Entity\RoleHierarchy;
use ChartItMD\Model\Entity\RolePermission;
use ChartItMD\Model\Entity\User;
use ChartItMD\Model\Entity\UserRole;
use Doctrine\DBAL\Connection;
use Doctrine\DBAL\DBALException;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\ORM\ORMInvalidArgumentException;
use Doctrine\ORM\Query\QueryException;

/**
 * Component for creating and controlling with role and permissions.
 * Class AuthManager
 *
 * @package ChartItMD\Component
 */
class AuthManager extends BaseComponent {
    /**
     * @param User $createdBy
     * @param Role $child
     * @param Role $parent
     *
     * @throws CyclicException
     * @throws ORMException
     * @throws QueryException
     * @throws \Exception
     */
    public function assignChildRoleToParent(User $createdBy, Role $child, Role $parent): void {
        $rh = new RoleHierarchy($createdBy, $parent, $child);
        $this->checkForCyclicHierarchy($parent->getId(), $child->getId());
        $this->entityManager->persist($rh);
    }
    /**
     * @param User       $createdBy
     * @param Permission $permission
     * @param Role       $role
     *
     * @throws ORMException
     * @throws \Exception
     */
    public function assignPermissionToRole(User $createdBy, Permission $permission, Role $role): void {
        $pr = new RolePermission($createdBy, $role, $permission);
        $this->entityManager->persist($pr);
    }
    /**
     * Assign role to user
     *
     * @param User $createdBy
     * @param Role $role
     * @param User $user
     *
     * @throws ORMException
     * @throws OptimisticLockException
     * @throws \Exception
     */
    public function assignRoleToUser(User $createdBy, Role $role, User $user): void {
        $ur = new UserRole($createdBy, $user, $role);
        $this->saveEntity($ur);
    }
    /**
     * Checking hierarchy cyclic line
     *
     * @param string $parentRoleId
     * @param string $childRoleId
     *
     * @throws CyclicException
     * @throws QueryException
     * @throws \InvalidArgumentException
     * @throws \RuntimeException
     */
    private function checkForCyclicHierarchy(string $parentRoleId, string $childRoleId): void {
        $result = $this->repositoryRegistry->getRoleHierarchyRepository()
                                           ->hasChildRoleId($parentRoleId, $childRoleId);
        if (true === $result) {
            throw new CyclicException(
                'There detected cyclic line. Role with id = ' . $parentRoleId . ' has child role whit id =' . $childRoleId
            );
        }
    }
    /**
     * Creates permission instance with given name and return it
     *
     * @param User   $createdBy
     * @param string $permissionName
     *
     * @return Permission
     * @throws ORMException
     * @throws \Exception
     */
    public function createPermission(User $createdBy, $permissionName): Permission {
        $p = new Permission($createdBy, $permissionName);
        $this->entityManager->persist($p);
        return $p;
    }
    /**
     * Creates role instance with given name and return it
     *
     * @param User   $createdBy
     * @param string $roleName
     *
     * @return Role
     * @throws ORMException
     * @throws \Exception
     */
    public function createRole(User $createdBy, string $roleName): Role {
        $r = new Role($createdBy, $roleName);
        $this->entityManager->persist($r);
        return $r;
    }
    /**
     * @param string $name
     * @param string $password
     *
     * @return User
     * @throws ORMException
     * @throws ORMInvalidArgumentException
     * @throws \Exception
     */
    public function createUser(string $name, string $password): User {
        $u = new User($name, $password);
        $this->entityManager->persist($u);
        return $u;
    }
    /**
     * Truncates all tables
     *
     * @param bool|null $includingUser
     *
     * @throws DatabaseException
     */
    public function removeAll(?bool $includingUser): void {
        $includingUser = $includingUser ?? false;
        /**
         * @var Connection $pdo
         */
        $pdo = $this->entityManager->getConnection()
                                   ->getWrappedConnection();
        /** @noinspection BadExceptionsProcessingInspection */
        try {
            $pdo->exec('SET FOREIGN_KEY_CHECKS=0');
            $pdo->exec('TRUNCATE permission');
            $pdo->exec('TRUNCATE role');
            $pdo->exec('TRUNCATE role_hierarchy');
            $pdo->exec('TRUNCATE role_permission');
            if ($includingUser) {
                $pdo->exec('TRUNCATE user');
            }
            $pdo->exec('TRUNCATE user_role');
            $pdo->exec('SET FOREIGN_KEY_CHECKS=1');
        } catch (DBALException $e) {
            throw new DatabaseException($e->getMessage());
        }
    }
}
