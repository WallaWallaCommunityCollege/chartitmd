<?php
declare(strict_types=1);
/**
 * Contains class Permission.
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

use ChartItMD\Utils\Uuid4Trait;
use Doctrine\ORM\Mapping as ORM;

/**
 * Permission
 *
 * @ORM\Table(name="permission",
 *     uniqueConstraints={
 *         @ORM\UniqueConstraint(name="idx_name", columns={"name"})
 *     }
 * )
 * @ORM\Entity(repositoryClass="ChartItMD\Model\Repository\PermissionRepository")
 * @ORM\HasLifecycleCallbacks
 */
class Permission {
    use Uuid4Trait;
    use EntityCommon;
    /**
     * Permission constructor.
     *
     * @param User   $createdBy
     * @param string $name
     *
     * @throws \Exception
     */
    public function __construct(User $createdBy, string $name) {
        $this->createdAt = new \DateTimeImmutable();
        $this->createdBy = $createdBy;
        $this->id = $this->asBase64();
        $this->name = $name;
    }
    /**
     * @return string
     */
    public function getDescription(): string {
        return $this->description;
    }
    /**
     * @return string
     */
    public function getName(): string {
        return $this->name;
    }
    /**
     * Date and time when entity was updated.
     *
     * Note:
     * Doctrine often will return date-times as plain string instead of correct
     * object so this method will correct it when called.
     *
     * @return \DateTime|null
     * @throws \Exception
     */
    public function getUpdatedAt(): ?\DateTime {
        if (null !== $this->updatedAt && !$this->updatedAt instanceof \DateTime) {
            $this->updatedAt = new \DateTime($this->updatedAt);
        }
        return $this->updatedAt;
    }
    /**
     * @return bool
     */
    public function isStatus(): bool {
        return $this->status;
    }
    /**
     * @ORM\PreUpdate
     * @throws \Exception
     */
    public function preUpdate(): void {
        $this->updatedAt = new \DateTime();
    }
    /**
     * @param string|null $value
     */
    public function setDescription(?string $value): void {
        $this->description = $value;
    }
    /**
     * @param bool|null $value
     */
    public function setStatus(?bool $value): void {
        $this->status = $value ?? true;
    }
    /**
     * @var string
     *
     * @ORM\Column(type="string", nullable=true)
     */
    private $description;
    /**
     * @var string
     *
     * @ORM\Column(type="string", length=100, nullable=false, unique=true)
     */
    private $name;
    /**
     * @var bool
     *
     * @ORM\Column(name="status", type="boolean", nullable=false)
     */
    private $status = true;
    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="updated_at", type="datetime", nullable=true)
     */
    private $updatedAt;
}
