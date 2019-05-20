<?php
declare(strict_types=1);
/**
 * Contains class BaseComponent.
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

use ChartItMD\Model\RepositoryRegistry;
use ChartItMD\Structure\AuthOptions;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\ORM\ORMInvalidArgumentException;
use Doctrine\ORM\Query\QueryException;

/**
 * Class BaseComponent
 *
 * @package ChartItMD\Component
 */
class BaseComponent {
    /**
     * AuthManager constructor.
     *
     * @param AuthOptions $authOptions
     */
    public function __construct(AuthOptions $authOptions) {
        $this->authOptions = $authOptions;
        $this->entityManager = $authOptions->getEntityManager();
        $this->repositoryRegistry = new RepositoryRegistry($this->entityManager);
    }
    /**
     * Checks access status
     *
     * @param string $userId
     * @param string $permissionName
     *
     * @return bool
     * @throws QueryException
     * @throws \InvalidArgumentException
     * @throws \RuntimeException
     */
    public function checkAccess(string $userId, string $permissionName): bool {
        $permissionId = $this->repositoryRegistry->getPermissionRepository()
                                                 ->getPermissionIdByName($permissionName);
        if (null !== $permissionId) {
            $rootRoleIds = $this->repositoryRegistry->getUserRoleRepository()
                                                    ->getUserRoleIds($userId);
            if (\count($rootRoleIds) > 0) {
                $allRoleIds = $this->repositoryRegistry->getRoleHierarchyRepository()
                                                       ->getAllRoleIdsHierarchy($rootRoleIds);
                return $this->repositoryRegistry->getRolePermissionRepository()
                                                ->isPermissionAssigned($permissionId, $allRoleIds);
            }
        }
        return false;
    }
    /**
     * Insert or update entity
     *
     * @param object $entity
     *
     * @return object
     * @throws ORMException
     * @throws ORMInvalidArgumentException
     * @throws OptimisticLockException
     */
    protected function saveEntity($entity) {
        $this->entityManager->persist($entity);
        $this->entityManager->flush($entity);
        return $entity;
    }
    /**
     * @var  AuthOptions $authOptions
     */
    protected $authOptions;
    /**
     * @var  EntityManager $entityManager
     */
    protected $entityManager;
    /**
     * @var  RepositoryRegistry $repositoryRegistry
     */
    protected $repositoryRegistry;
}
