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

/**
 * UserRole
 *
 * @ORM\Table(name="user_role",
 *     indexes={
 *         @ORM\Index(name="idx_user_role", columns={"user_id", "role_id"}),
 *         @ORM\Index(name="idx_created_at", columns={"created_at"})
 * })
 * @ORM\Entity(repositoryClass="ChartItMD\Model\Repository\UserRoleRepository")
 */
class UserRole implements \JsonSerializable {
    use RbacCommon;
    /**
     * UserRole constructor.
     *
     * @param User $createdBy
     * @param User $user
     * @param Role $role
     *
     * @throws \Exception
     */
    public function __construct(User $createdBy, User $user, Role $role) {
        $this->role = $role;
        $this->user = $user;
        $this->createdAt = new \DateTimeImmutable();
        $this->createdBy = $createdBy;
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
     * @var Role
     *
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="Role")
     */
    private $role;
    /**
     * @var User
     *
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="User")
     */
    private $user;
}
