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

/**
 * Location of measurement, injection site, etc.
 *
 * Class Location.
 *
 * @ORM\Table(name="location",
 *     indexes={
 *         @ORM\Index(name="idx_created_at", columns={"created_at"})
 *     }
 * )
 * @ORM\Entity(repositoryClass="ChartItMD\Model\Repository\LocationRepository")
 */
class Location implements \JsonSerializable {
    use DAndNCommon;
    use EntityCommon;
    use Uuid4Trait;
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
     * @return string|null
     */
    public function getAbbreviation(): ?string {
        return $this->abbreviation;
    }
    /**
     * @param string|null $value
     *
     * @return self Fluent interface
     */
    public function setAbbreviation(?string $value): self {
        $this->abbreviation = $value;
        return $this;
    }
    /**
     * @var string|null
     *
     * @ORM\Column(name="abbreviation", type="string", length=15, nullable=true)
     */
    private $abbreviation;
}
