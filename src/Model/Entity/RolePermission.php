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
 *     indexes={@ORM\Index(name="idx_role_permission", columns={"role_id","permission_id"}),
 *     @ORM\Index(name="fk_permission_id",columns={"permission_id"}),
 *     @ORM\Index(name="fk_role_id",columns={"role_id"})
 * })
 * @ORM\Entity(repositoryClass="ChartItMD\Model\Repository\RolePermissionRepository")
 */
class RolePermission {
    public function __construct(Role $role, Permission $permission) {
        $this->permission = $permission;
        $this->role = $role;
        $this->createdAt = new \DateTimeImmutable();
    }
    /**
     * @return \DateTimeImmutable
     */
    public function getCreatedAt(): \DateTimeImmutable {
        return $this->createdAt;
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
     * @var \DateTimeImmutable
     *
     * @ORM\Column(name="created_at", type="datetime", nullable=false)
     */
    private $createdAt;
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
