<?php
declare(strict_types=1);
/**
 * Contains class MeasurementRange.
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
 * Class MeasurementRange.
 *
 * @ORM\Table(name="measurement_range",
 *     indexes={
 *         @ORM\Index(name="idx_created_at", columns={"created_at"})
 *     }
 * )
 * @ORM\Entity(repositoryClass="ChartItMD\Model\Repository\MeasurementRangeRepository")
 */
class MeasurementRange implements \JsonSerializable {
    use DAndNCommon;
    use EntityCommon;
    use Uuid4Trait;
    /**
     * MeasurementRange constructor.
     *
     * @param User   $createdBy
     * @param string $name
     *
     * @throws \Exception
     */
    public function __construct(User $createdBy, string $name) {
        $this->createdAt = new \DateTimeImmutable();
        $this->createdBy = $createdBy->getId();
        $this->id = $this->asBase64();
        $this->name = $name;
    }
    /**
     * @var float $maximum
     *
     * @ORM\Column(type="float", nullable=false)
     */
    private $maximum = \INF;
    /**
     * @var float $minimum
     *
     * @ORM\Column(type="float", nullable=false)
     */
    private $minimum = -\INF;
    /**
     * @var float $sigmaMinus1
     *
     * @ORM\Column(name="sigma_minus1", type="float", nullable=false)
     */
    private $sigmaMinus1;
    /**
     * @var float $sigmaMinus2
     *
     * @ORM\Column(name="sigma_minus2", type="float", nullable=true)
     */
    private $sigmaMinus2;
    /**
     * @var float $sigmaMinus3
     *
     * @ORM\Column(name="sigma_minus3", type="float", nullable=true)
     */
    private $sigmaMinus3;
    /**
     * @var float $sigmaPlus1
     *
     * @ORM\Column(name="sigma_plus1", type="float", nullable=false)
     */
    private $sigmaPlus1;
    /**
     * @var float $sigmaPlus2
     *
     * @ORM\Column(name="sigma_plus2", type="float", nullable=true)
     */
    private $sigmaPlus2;
    /**
     * @var float $sigmaPlus3
     *
     * @ORM\Column(name="sigma_plus3", type="float", nullable=true)
     */
    private $sigmaPlus3;
    /**
     * @var float $step Also known as precision.
     *
     * @ORM\Column(name="step_size", type="float", nullable=false)
     */
    private $stepSize;
}
