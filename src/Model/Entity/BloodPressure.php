<?php
declare(strict_types=1);
/**
 * Contains class BloodPressure.
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
 * Class BloodPressure.
 *
 * @ORM\Table(name="blood_pressure", indexes={
 *     @ORM\Index(name="fk_location_used", columns={"location_used"}),
 *     @ORM\Index(name="fk_measured_in", columns={"measured_in"}),
 *     @ORM\Index(name="fk_method_used", columns={"method_used"}),
 *     @ORM\Index(name="idx_created_at", columns={"created_at"})
 * })
 * @ORM\Entity(repositoryClass="ChartItMD\Model\Repository\BloodPressureRepository")
 */
class BloodPressure {
    use Uuid4Trait;
    use EntityCommon;
    /**
     * BloodPressure constructor.
     *
     * @param User    $createdBy
     * @param Patient $patient
     * @param int     $diastolic
     * @param int     $systolic
     *
     * @throws \Exception
     */
    public function __construct(User $createdBy, Patient $patient, int $diastolic, int $systolic) {
        $this->createdAt = new \DateTimeImmutable();
        $this->createdBy = $createdBy;
        $this->diastolic = $diastolic;
        $this->id = $this->asBase64();
        $this->patient = $patient;
        $this->systolic = $systolic;
    }
    /**
     * @return string
     */
    public function getDiastolic(): string {
        return $this->diastolic;
    }
    /**
     * @return Location
     */
    public function getLocationUsed(): Location {
        return $this->locationUsed;
    }
    /**
     * @return string
     */
    public function getMeasuredIn(): string {
        return $this->measuredIn;
    }
    /**
     * @return string
     */
    public function getMethodUsed(): string {
        return $this->methodUsed;
    }
    /**
     * @return Patient
     */
    public function getPatient(): Patient {
        return $this->patient;
    }
    /**
     * @return string
     */
    public function getSystolic(): string {
        return $this->systolic;
    }
    /**
     * @param string $value
     *
     * @return self Fluent interface
     */
    public function setLocationUsed(string $value): self {
        $this->locationUsed = $value;
        return $this;
    }
    /**
     * @param string $value
     *
     * @return self Fluent interface
     */
    public function setMeasuredIn(string $value): self {
        $this->measuredIn = $value;
        return $this;
    }
    /**
     * @param string $value
     *
     * @return self Fluent interface
     */
    public function setMethodUsed(string $value): self {
        $this->methodUsed = $value;
        return $this;
    }
    /**
     * @var string $diastolic (bottom number)
     *
     * @ORM\Column(type="decimal", precision=3, scale=0, nullable=false)
     */
    private $diastolic;
    /**
     * @var Location $locationUsed
     *
     * @ORM\ManyToOne(targetEntity="Location")
     * @ORM\JoinColumn(name="location_used", referencedColumnName="id", nullable=true)
     */
    private $locationUsed;
    /**
     * @var string $measuredIn Unit of measurement used.
     *
     * @ORM\ManyToOne(targetEntity="UnitOfMeasurement")
     * @ORM\JoinColumn(name="measured_in", referencedColumnName="id", nullable=true)
     */
    private $measuredIn;
    /**
     * @var string $methodUsed
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
    /**
     * @var string $systolic (top number)
     *
     * @ORM\Column(type="decimal", precision=3, scale=0, nullable=false)
     */
    private $systolic;
}
