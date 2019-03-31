<?php
declare(strict_types=1);
/**
 * Contains class Role.
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
 * Role
 *
 * @ORM\Table(name="role",
 *     uniqueConstraints={
 *         @ORM\UniqueConstraint(name="idx_name", columns={"name"})
 *     }
 * )
 * @ORM\Entity(repositoryClass="ChartItMD\Model\Repository\RoleRepository")
 * @ORM\HasLifecycleCallbacks
 */
class Role {
    use Uuid4Trait;

    // TODO: Look at using EntityCommon trait with this class as well or something.
    /**
     * Role constructor.
     *
     * @param User   $createdBy
     * @param string $name
     *
     * @throws \Exception
     */
    public function __construct(User $createdBy, string $name) {
        $this->name = $name;
        $this->id = $this->asBase64();
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
     * @return string
     */
    public function getDescription(): string {
        return $this->description;
    }
    /**
     * @return string
     */
    public function getId(): string {
        return $this->id;
    }
    /**
     * @return string
     */
    public function getName(): string {
        return $this->name;
    }
    /**
     * @return \DateTime
     */
    public function getUpdatedAt(): \DateTime {
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
     * @param string $value
     */
    public function setDescription(string $value): void {
        $this->description = $value;
    }
    /**
     * @param string $value
     */
    public function setName(string $value): void {
        $this->name = $value;
    }
    /**
     * @param bool $value
     */
    public function setStatus(bool $value): void {
        $this->status = $value;
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
     * @var string
     *
     * @ORM\Column(type="string", nullable=true)
     */
    private $description;
    /**
     * @var string
     *
     * @ORM\Column(type="uuid64", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="CUSTOM")
     * @ORM\CustomIdGenerator(class="ChartItMD\Model\Uuid64Generator")
     */
    private $id;
    /**
     * @var string
     *
     * @ORM\Column(type="string", length=50, nullable=false, unique=true)
     */
    private $name;
    /**
     * @var bool
     *
     * @ORM\Column(type="boolean", nullable=false)
     */
    private $status = true;
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updated_at", type="datetime", nullable=true)
     */
    private $updatedAt;
}
