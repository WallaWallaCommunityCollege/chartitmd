<?php
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
 *     indexes={@ORM\Index(name="idx_parent_child", columns={"parent_id", "child_id"}),
 *     @ORM\Index(name="fk_child_id",columns={"child_id"}),
 *     @ORM\Index(name="fk_parent_id",columns={"parent_id"})
 * })
 * @ORM\Entity(repositoryClass="ChartItMD\Model\Repository\RoleHierarchyRepository")
 */
class RoleHierarchy {
    public function __construct(Role $parent, Role $child) {
        $this->parent = $parent;
        $this->child = $child;
        $this->createdAt = new \DateTimeImmutable();
    }
    /**
     * @return string
     */
    public function getChild(): string {
        return $this->child;
    }
    /**
     * @return \DateTimeImmutable
     */
    public function getCreatedAt(): \DateTimeImmutable {
        return $this->createdAt;
    }
    /**
     * @return string
     */
    public function getParent(): string {
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
     * @var \DateTimeImmutable
     *
     * @ORM\Column(name="created_at", type="datetime", nullable=false)
     */
    private $createdAt;
    /**
     * @var Role
     *
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="Role")
     */
    private $parent;
}