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
     * @param Role $child
     * @param Role $parent
     *
     * @throws CyclicException
     * @throws ORMException
     * @throws ORMInvalidArgumentException
     * @throws QueryException
     * @throws \InvalidArgumentException
     * @throws \RuntimeException
     * @throws \Exception
     */
    public function assignChildRoleToParent(Role $child, Role $parent): void {
        $rh = new RoleHierarchy($parent->getId(), $child->getId());
        $this->checkForCyclicHierarchy($parent->getId(), $child->getId());
        $this->entityManager->persist($rh);
    }
    /**
     * @param Permission $permission
     * @param Role       $role
     *
     * @throws ORMException
     * @throws ORMInvalidArgumentException
     * @throws \Exception
     */
    public function assignPermissionToRole(Permission $permission, Role $role): void {
        $pr = new RolePermission($role->getId(), $permission->getId());
        $this->entityManager->persist($pr);
    }
    /**
     * Assign role to user
     *
     * @param Role $role
     * @param User $user
     *
     * @throws ORMException
     * @throws ORMInvalidArgumentException
     * @throws OptimisticLockException
     * @throws \Exception
     */
    public function assignRoleToUser(Role $role, User $user): void {
        $ur = new UserRole($role->getId(), $user->getId());
        $this->saveEntity($ur);
    }
    /**
     * Creates permission instance with given name and return it
     *
     * @param string $permissionName
     *
     * @return Permission
     * @throws ORMException
     * @throws ORMInvalidArgumentException
     * @throws \Exception
     */
    public function createPermission($permissionName): Permission {
        $p = new Permission($permissionName);
        $this->entityManager->persist($p);
        return $p;
    }
    /**
     * Creates role instance with given name and return it
     *
     * @param string $roleName
     *
     * @return Role
     * @throws ORMException
     * @throws ORMInvalidArgumentException
     * @throws \Exception
     */
    public function createRole($roleName): Role {
        $r = new Role($roleName);
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
     * @param bool $includingUser
     *
     * @throws DatabaseException
     */
    public function removeAll(bool $includingUser = false): void {
        $pdo =
            $this->entityManager->getConnection()
                                ->getWrappedConnection();
        $pdo->beginTransaction();
        try {
            $pdo->exec('SET FOREIGN_KEY_CHECKS=0');
            $pdo->exec('TRUNCATE role_permission');
            $pdo->exec('TRUNCATE role_hierarchy');
            $pdo->exec('TRUNCATE role');
            $pdo->exec('TRUNCATE permission');
            $pdo->exec('TRUNCATE user_role');
            if ($includingUser) {
                $pdo->exec('TRUNCATE user');
            }
            $pdo->exec('SET FOREIGN_KEY_CHECKS=1');
            $pdo->commit();
        } catch (\Exception $e) {
            $pdo->rollBack();
            throw new DatabaseException($e->getMessage());
        }
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
        $result =
            $this->repositoryRegistry->getRoleHierarchyRepository()
                                     ->hasChildRoleId($parentRoleId, $childRoleId);
        if ($result === true) {
            throw new CyclicException(
                'There detected cyclic line. Role with id = ' .
                $parentRoleId .
                ' has child role whit id =' .
                $childRoleId
            );
        }
    }
}