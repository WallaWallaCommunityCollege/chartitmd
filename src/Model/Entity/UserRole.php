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

namespace ChartItMD\Model\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\ManyToOne;

/**
 * UserRole
 *
 * @ORM\Table(name="user_role",
 *     indexes={@ORM\Index(name="idx_user_role", columns={"user_id", "role_id"}),
 *     @ORM\Index(name="fk_role_id",columns={"role_id"}),
 *     @ORM\Index(name="fk_user_id",columns={"user_id"})
 * })
 * @ORM\Entity(repositoryClass="ChartItMD\Model\Repository\UserRoleRepository")
 */
class UserRole {
    public function __construct(User $user, Role $role) {
        $this->role = $role;
        $this->user = $user;
        $this->createdAt = new \DateTimeImmutable();
    }
    /**
     * @return \DateTimeImmutable
     */
    public function getCreatedAt(): \DateTimeImmutable {
        return $this->createdAt;
    }
    /**
     * @return Role
     */
    public function getRole(): Role {
        return $this->role;
    }
    /**
     * @return User
     */
    public function getUser(): User {
        return $this->user;
    }
    /**
     * @var \DateTimeImmutable
     *
     * @ORM\Column(name="created_at", type="datetime", nullable=false)
     */
    private $createdAt;
    /**
     * @var Role
     *
     * @ORM\Id
     * @ManyToOne(targetEntity="Role")
     */
    private $role;
    /**
     * @var User
     *
     * @ORM\Id
     * @ManyToOne(targetEntity="User")
     */
    private $user;
}
