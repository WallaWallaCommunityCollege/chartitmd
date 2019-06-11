<?php
declare(strict_types=1);
/**
 * Contains trait EntityCommon.
 *
 * PHP version 7.2+
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

/**
 * Trait of common entity properties, their getters, and generic JSON Serializing.
 *
 * Used in composition pattern vs inherits model with classes.
 */
trait EntityCommon {
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
     * @return User
     */
    public function getCreatedBy(): User {
        return $this->createdBy;
    }
    /**
     * @return string
     */
    public function getId(): string {
        return $this->id;
    }
    /**
     * Simple entity JSON serializer implementation.
     *
     * Should be usable directly by most Doctrine Entity classes without
     * overriding.
     *
     * @return array
     */
    public function jsonSerialize(): array {
        $result = [];
        foreach ($this as $k => $v) {
            $result[$k] = $v;
        }
        // Filter out any unneeded Doctrine Entity Proxy c**p.
        unset($result['__initializer__'], $result['__cloner__'], $result['__isInitialized__']);
        // Filter sensitive properties.
        /** @noinspection UnsetConstructsCanBeMergedInspection */
        unset($result['password']);
        // Filter out redundant patient.
        /** @noinspection UnsetConstructsCanBeMergedInspection */
        //unset($result['patient']);
        return $result;
    }
    /**
     * @var \DateTimeImmutable
     *
     * @ORM\Column(name="created_at", type="datetime_immutable", nullable=false)
     */
    private $createdAt;
    /**
     * @var User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumn(name="created_by", referencedColumnName="id", nullable=false)
     */
    private $createdBy;
    /**
     * @var string
     *
     * @ORM\Column(type="uuid64", nullable=false, options={"fixed":true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="CUSTOM")
     * @ORM\CustomIdGenerator(class="ChartItMD\Model\Uuid64Generator")
     */
    private $id;
}
