<?php
declare(strict_types=1);
/**
 * Contains class User.
 *
 * PHP version 7.1+
 *
 * LICENSE:
 * This file is part of ChartItMD.
 * Copyright (C) 2019 ChartItMD Development Group
 *
 * @author    Michael Cummings <mgcummings@yahoo.com>
 * @copyright 2019 ChartItMD Development Group
 * @license   Proprietary
 */

namespace ChartItMD\Model\Entity;

use ChartItMD\Utils\Uuid4Trait;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class User.
 *
 * @ORM\Table(name="user",
 *     indexes={
 *         @ORM\Index(name="idx_created_at", columns={"created_at"})
 *     }
 * )
 * @ORM\Entity(repositoryClass="ChartItMD\Model\Repository\UserRepository")
 * @ORM\HasLifecycleCallbacks
 */
class User implements \JsonSerializable {
    use Uuid4Trait;
    /**
     * User constructor.
     *
     * @param string $name
     * @param string $password
     *
     * @throws \Exception
     * @throws \UnexpectedValueException
     */
    public function __construct(string $name, string $password) {
        $this->name = $name;
        $this->setPassword($password);
        $this->id = $this->asBase64();
        $this->createdAt = new \DateTimeImmutable();
    }
    /**
     * Date and time when entity was created.
     *
     * Note:
     * Doctrine often will return date-times as plain string instead of correct
     * object so this method will correct it when called.
     *
     * @return \DateTimeImmutable
     * @throws \Exception
     */
    public function getCreatedAt(): \DateTimeImmutable {
        if (!$this->createdAt instanceof \DateTimeImmutable) {
            $this->createdAt = new \DateTimeImmutable($this->createdAt);
        }
        return $this->createdAt;
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
     * @return string
     */
    public function getPassword(): string {
        return $this->password;
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
        // Filter sensitive properties.
        /** @noinspection UnsetConstructsCanBeMergedInspection */
        unset($result['password']);
        return $result;
    }
    /**
     * @ORM\PreUpdate
     * @throws \Exception
     */
    public function preUpdate(): void {
        $this->updatedAt = new \DateTimeImmutable();
    }
    /**
     * Sets user password.
     *
     * NOTE:
     *      Ensures all passwords have at least default hashing.
     *
     * @param string $value
     *
     * @return self Fluent interface
     * @throws \UnexpectedValueException
     */
    public function setPassword(string $value): self {
        $info = \password_get_info($value);
        if (0 === $info['algo'] || 'unknown' === $info['algoName']) {
            $value = \password_hash($value, \PASSWORD_DEFAULT);
            if (false === $value) {
                throw new \UnexpectedValueException('Password hashing failed for user');
            }
        }
        $this->password = $value;
        return $this;
    }
    /**
     * @var \DateTimeImmutable
     *
     * @ORM\Column(name="created_at", type="datetime_immutable", nullable=false)
     */
    private $createdAt;
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
     * @ORM\Column(type="string", length=100, nullable=false, unique=true)
     */
    private $name;
    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255, nullable=false)
     */
    private $password;
    /**
     * @var \DateTimeImmutable|null
     *
     * @ORM\Column(name="updated_at", type="datetime_immutable", nullable=true)
     */
    private $updatedAt;
}
