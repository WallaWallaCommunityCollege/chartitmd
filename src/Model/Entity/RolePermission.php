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
 *     @ORM\Index(name="idx_role_permission", columns={"role_id","permission_id"}),
 *     @ORM\Index(name="fk_permission_id",columns={"permission_id"}),
 *     @ORM\Index(name="fk_role_id",columns={"role_id"})
 * })
 * @ORM\Entity(repositoryClass="ChartItMD\Model\Repository\RolePermissionRepository")
 */
class RolePermission implements \JsonSerializable {
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
     * @return \DateTimeImmutable
     */
    public function getCreatedAt(): \DateTimeImmutable {
        return $this->createdAt;
    }
    /**
     * @return User
     */
    public function getCreatedBy(): User {
        return $this->createdBy;
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
     * Specify data which should be serialized to JSON
     *
     * NOTE:
     * This filters out sensitive information like the password.
     *
     * @return array
     */
    public function jsonSerialize(): array {
        $result = [];
        /** @noinspection ForeachSourceInspection */
        foreach ($this as $k => $v) {
            $result[$k] = $v;
        }
        // Filter out any unneeded Doctrine Entity Proxy c**p.
        unset($result['__initializer__'], $result['__cloner__'], $result['__isInitialized__']);
        return $result;
    }
    /**
     * @var \DateTimeImmutable
     *
     * @ORM\Column(name="created_at", type="datetime", nullable=false)
     */
    private $createdAt;
    /**
     * @var User $createdBy
     *
     * @ORM\Column(name="created_by", type="uuid64", nullable=false)
     * @ORM\ManyToOne(targetEntity="User")
     */
    private $createdBy;
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
