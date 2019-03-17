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

/**
 * Units of Measurement like: beats per minute, milliliters, centimeters, etc.
 *
 * Class UnitOfMeasurement.
 */
class UnitOfMeasurement {
    use Uuid4Trait;
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
    private $name;
    private $symbol;
    /**
     * @var string $unitOf One of Mass, Pressure, Temperature, Time, Length, etc.
     */
    private $unitOf;
}
