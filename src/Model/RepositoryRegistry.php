<?php
declare(strict_types=1);
/**
 * Contains class RepositoryRegistry.
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

namespace ChartItMD\Model;

use ChartItMD\Model\Entity\Permission;
use ChartItMD\Model\Entity\Role;
use ChartItMD\Model\Entity\RoleHierarchy;
use ChartItMD\Model\Entity\RolePermission;
use ChartItMD\Model\Entity\UserRole;
use ChartItMD\Model\Repository\PermissionRepository;
use ChartItMD\Model\Repository\RoleHierarchyRepository;
use ChartItMD\Model\Repository\RolePermissionRepository;
use ChartItMD\Model\Repository\RoleRepository;
use ChartItMD\Model\Repository\UserRoleRepository;
use Doctrine\ORM\EntityManagerInterface;

class RepositoryRegistry {
    public function __construct(EntityManagerInterface $entityManager) {
        $this->entityManager = $entityManager;
    }
    /**
     * @return PermissionRepository
     */
    public function getPermissionRepository(): PermissionRepository {
        /**
         * @var PermissionRepository $pr
         */
        $pr = $this->entityManager->getRepository(Permission::class);
        return $pr;
    }
    /**
     * @return RoleHierarchyRepository
     */
    public function getRoleHierarchyRepository(): RoleHierarchyRepository {
        /**
         * @var RoleHierarchyRepository $rhr
         */
        $rhr = $this->entityManager->getRepository(RoleHierarchy::class);
        return $rhr;
    }
    /**
     * @return RolePermissionRepository
     */
    public function getRolePermissionRepository(): RolePermissionRepository {
        /**
         * @var RolePermissionRepository $rpr
         */
        $rpr = $this->entityManager->getRepository(RolePermission::class);
        return $rpr;
    }
    /**
     * @return RoleRepository
     */
    public function getRoleRepository(): RoleRepository {
        /**
         * @var RoleRepository $rr
         */
        $rr = $this->entityManager->getRepository(Role::class);
        return $rr;
    }
    /**
     * @return UserRoleRepository
     */
    public function getUserRoleRepository(): UserRoleRepository {
        /**
         * @var UserRoleRepository $urr
         */
        $urr = $this->entityManager->getRepository(UserRole::class);
        return $urr;
    }
    /**
     * @var EntityManagerInterface $entityManager
     */
    private $entityManager;
}
