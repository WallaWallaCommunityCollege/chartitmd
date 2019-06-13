<?php
declare(strict_types=1);
/**
 * Contains class UnitOfMeasurement.
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
 * Units of Measurement like: beats per minute, milliliters, centimeters, etc.
 *
 * Class UnitOfMeasurement.
 *
 * @ORM\Table(name="unit_of_measurement",
 *     indexes={
 *         @ORM\Index(name="idx_created_at", columns={"created_at"})
 *     }
 * )
 * @ORM\Entity(repositoryClass="ChartItMD\Model\Repository\UnitOfMeasurementRepository")
 */
class UnitOfMeasurement implements \JsonSerializable {
    use DAndNCommon;
    use EntityCommon;
    use Uuid4Trait;
    /**
     * UnitOfMeasurement constructor.
     *
     * @param User   $createdBy
     * @param string $name
     * @param string $symbol
     * @param string $unitOf
     *
     * @throws \Exception
     */
    public function __construct(User $createdBy, string $name, string $symbol, string $unitOf) {
        $this->createdAt = new \DateTimeImmutable();
        $this->createdBy = $createdBy->getId();
        $this->id = $this->asBase64();
        $this->name = $name;
        $this->symbol = $symbol;
        $this->unitOf = $unitOf;
    }
    /**
     * @var MeasurementLimits
     *
     * @ORM\ManyToOne(targetEntity="MeasurementLimits")
     * @ORM\JoinColumn(name="measurement_limits", referencedColumnName="id", nullable=true)
     */
    private $measurementLimits;
    /**
     * @var string
     *
     * @ORM\Column(type="string", length=15, nullable=false, unique=false)
     */
    private $symbol;
    /**
     * @var string $unitOf One of Mass, Pressure, Temperature, Time, Length, etc.
     *
     * @ORM\Column(name="unit_of", type="string", length=50, nullable=false, unique=false)
     */
    private $unitOf;
}
