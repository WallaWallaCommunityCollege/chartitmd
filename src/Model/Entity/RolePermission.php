<?php
declare(strict_types=1);
/**
 * Contains class RolePermission.
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

namespace ChartItMD\Model\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * RolePermission
 *
 * @ORM\Table(name="role_permission",
 *     indexes={
 *         @ORM\Index(name="idx_role_permission", columns={"role_id","permission_id"}),
 *         @ORM\Index(name="idx_created_at", columns={"created_at"})
 * })
 * @ORM\Entity(repositoryClass="ChartItMD\Model\Repository\RolePermissionRepository")
 */
class RolePermission implements \JsonSerializable {
    use RbacCommon;
    /**
     * RolePermission constructor.
     *
     * @param User       $createdBy
     * @param Role       $role
     * @param Permission $permission
     *
     * @throws \Exception
     */
    public function __construct(User $createdBy, Role $role, Permission $permission) {
        $this->permission = $permission;
        $this->role = $role;
        $this->createdAt = new \DateTimeImmutable();
        $this->createdBy = $createdBy;
    }
    /**
     * @return Permission
     */
    public function getPermission(): Permission {
        return $this->permission;
    }
    /**
     * @return Role
     */
    public function getRole(): Role {
        return $this->role;
    }
    /**
     * @var Permission
     *
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="Permission")
     */
    private $permission;
    /**
     * @var Role
     *
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="Role")
     */
    private $role;
}
