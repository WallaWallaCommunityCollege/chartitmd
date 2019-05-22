<?php
declare(strict_types=1);
/**
 * Contains class Method.
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
 * Method use in procedure, of measurement, etc.
 *
 * Class Method.
 *
 * @ORM\Table(name="method",
 *     indexes={
 *         @ORM\Index(name="idx_created_at", columns={"created_at"})
 *     },
 *     uniqueConstraints={
 *         @ORM\UniqueConstraint(name="uniq_name", columns={"name"})
 *     }
 * )
 * @ORM\Entity(repositoryClass="ChartItMD\Model\Repository\MethodRepository")
 */
class Method implements JsonSerializable {
    use Uuid4Trait;
    use EntityCommon;
    /**
     * Method constructor.
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
        $this->createdBy = $createdBy->getId();
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
     *
     * @return self Fluent interface
     */
    public function setAbbreviation(string $value): self {
        $this->abbreviation = $value;
        return $this;
    }
    /**
     * @param string $value
     *
     * @return self Fluent interface
     */
    public function setDescription(string $value): self {
        $this->description = $value;
        return $this;
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
