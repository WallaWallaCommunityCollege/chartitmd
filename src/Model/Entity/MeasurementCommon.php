<?php
declare(strict_types=1);
/**
 * Contains trait MeasurementCommon.
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
 * Trait MeasurementCommon.
 */
trait MeasurementCommon {
    /**
     * @return Location|null
     */
    public function getLocation(): ?Location {
        return $this->location;
    }
    /**
     * @return UnitOfMeasurement|null
     */
    public function getMeasuredIn(): ?UnitOfMeasurement {
        return $this->measuredIn;
    }
    /**
     * @return Method|null
     */
    public function getMethodUsed(): ?Method {
        return $this->methodUsed;
    }
    /**
     * @return Patient
     */
    public function getPatient(): Patient {
        return $this->patient;
    }
    /**
     * @param Location $value
     *
     * @return self Fluent interface
     */
    public function setLocation(?Location $value): self {
        $this->location = $value;
        return $this;
    }
    /**
     * @param UnitOfMeasurement|null $value
     *
     * @return self Fluent interface
     */
    public function setMeasuredIn(?UnitOfMeasurement $value): self {
        $this->measuredIn = $value;
        return $this;
    }
    /**
     * @param Method|null $value
     *
     * @return self Fluent interface
     */
    public function setMethodUsed(?Method $value): self {
        $this->methodUsed = $value;
        return $this;
    }
    /**
     * @var Location|null $location
     *
     * @ORM\ManyToOne(targetEntity="Location")
     * @ORM\JoinColumn(name="location", referencedColumnName="id", nullable=true)
     */
    private $location;
    /**
     * @var UnitOfMeasurement|null $measuredIn Unit of measurement used.
     *
     * @ORM\ManyToOne(targetEntity="UnitOfMeasurement")
     * @ORM\JoinColumn(name="measured_in", referencedColumnName="id", nullable=true)
     */
    private $measuredIn;
    /**
     * @var Method|null $methodUsed
     *
     * @ORM\ManyToOne(targetEntity="Method")
     * @ORM\JoinColumn(name="method_used", referencedColumnName="id", nullable=true)
     */
    private $methodUsed;
    /**
     * @var Patient $patient
     *
     * @ORM\ManyToOne(targetEntity="Patient", inversedBy="BloodPressures")
     * @ORM\JoinColumn(nullable=false)
     */
    private $patient;
}
