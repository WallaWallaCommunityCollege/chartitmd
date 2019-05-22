<?php
declare(strict_types=1);
/**
 * Contains class Location.
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

use ChartItMD\Utils\Uuid4Trait;
use Doctrine\ORM\Mapping as ORM;
use JsonSerializable;

/**
 * Location of measurement, injection site, etc.
 *
 * Class Location.
 *
 * @ORM\Table(name="location",
 *     indexes={
 *         @ORM\Index(name="idx_created_at", columns={"created_at"})
 *     },
 *     uniqueConstraints={
 *         @ORM\UniqueConstraint(name="uniq_name", columns={"name"})
 *     }
 * )
 * @ORM\Entity(repositoryClass="ChartItMD\Model\Repository\LocationRepository")
 */
class Location implements JsonSerializable {
    use Uuid4Trait;
    use EntityCommon;
    /**
     * Location constructor.
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
     * @return string
     */
    public function getAbbreviation(): string {
        return $this->abbreviation;
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
     * @param string $value
     */
    public function setAbbreviation(string $value): void {
        $this->abbreviation = $value;
    }
    /**
     * @param string $value
     */
    public function setDescription(string $value): void {
        $this->description = $value;
    }
    /**
     * @var string
     *
     * @ORM\Column(name="abbreviation", type="string", length=15, nullable=true)
     */
    private $abbreviation;
    /**
     * @var string
     *
     * @ORM\Column(type="string", nullable=true)
     */
    private $description;
    /**
     * @var string
     *
     * @ORM\Column(type="string", length=50, nullable=false, unique=true)
     */
    private $name;
}
