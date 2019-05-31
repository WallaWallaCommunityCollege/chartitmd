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
 *     indexes={
 *         @ORM\Index(name="idx_created_at", columns={"created_at"})
 *     }
 * )
 * @ORM\Entity(repositoryClass="ChartItMD\Model\Repository\RoleRepository")
 * @ORM\HasLifecycleCallbacks
 */
class Role implements \JsonSerializable {
    use DAndNCommon;
    use EntityCommon;
    use Uuid4Trait;
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
     * Date and time when entity was updated.
     *
     * Note:
     * Doctrine often will return date-times as plain string instead of correct
     * object so this method will correct it when called.
     *
     * @return \DateTimeImmutable|null
     * @throws \Exception
     */
    public function getUpdatedAt(): ?\DateTimeImmutable {
        if (null !== $this->updatedAt && !$this->updatedAt instanceof \DateTimeImmutable) {
            $this->updatedAt = new \DateTimeImmutable($this->updatedAt);
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
        $this->updatedAt = new \DateTimeImmutable();
    }
    /**
     * @param bool|null $value
     */
    public function setStatus(?bool $value): void {
        $this->status = $value ?? true;
    }
    /**
     * @var bool
     *
     * @ORM\Column(type="boolean", nullable=false)
     */
    private $status = true;
    /**
     * @var \DateTimeImmutable|null
     *
     * @ORM\Column(name="updated_at", type="datetime_immutable", nullable=true)
     */
    private $updatedAt;
}
