<?php
declare(strict_types=1);
/**
 * Contains class RoleHierarchy.
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
 * RoleHierarchy
 *
 * @ORM\Table(name="role_hierarchy",
 *     indexes={
 *         @ORM\Index(name="idx_parent_child", columns={"parent_id", "child_id"}),
 *         @ORM\Index(name="idx_created_at", columns={"created_at"})
 * })
 * @ORM\Entity(repositoryClass="ChartItMD\Model\Repository\RoleHierarchyRepository")
 */
class RoleHierarchy implements \JsonSerializable {
    use RbacCommon;
    /**
     * RoleHierarchy constructor.
     *
     * @param User $createdBy
     * @param Role $parent
     * @param Role $child
     *
     * @throws \Exception
     */
    public function __construct(User $createdBy, Role $parent, Role $child) {
        $this->parent = $parent;
        $this->child = $child;
        $this->createdAt = new \DateTimeImmutable();
        $this->createdBy = $createdBy;
    }
    /**
     * @return Role
     */
    public function getChild(): Role {
        return $this->child;
    }
    /**
     * @return Role
     */
    public function getParent(): Role {
        return $this->parent;
    }
    /**
     * @var Role
     *
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="Role")
     */
    private $child;
    /**
     * @var Role
     *
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="Role")
     */
    private $parent;
}
