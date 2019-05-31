<?php
declare(strict_types=1);
/**
 * Contains class Height.
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
 * Class Height.
 *
 * @ORM\Table(name="height",
 *     indexes={
 *         @ORM\Index(name="idx_created_at", columns={"created_at"})
 *     }
 * )
 * @ORM\Entity(repositoryClass="ChartItMD\Model\Repository\HeightRepository")
 */
class Height implements \JsonSerializable {
    use Uuid4Trait;
    use EntityCommon;
    /**
     * PatientHeight constructor.
     *
     * @param User    $createdBy
     * @param Patient $patient
     * @param string  $measurement
     *
     * @throws \Exception
     */
    public function __construct(User $createdBy, Patient $patient, string $measurement) {
        $this->createdAt = new \DateTimeImmutable();
        $this->createdBy = $createdBy;
        $this->id = $this->asBase64();
        $this->measurement = $measurement;
        $this->patient = $patient;
    }
    /**
     * @return string
     */
    public function getMeasurement(): string {
        return $this->measurement;
    }
    /**
     * @return UnitOfMeasurement|null
     */
    public function getMeasuredIn(): ?UnitOfMeasurement {
        return $this->measuredIn;
    }
    /**
     * @return Patient
     */
    public function getPatient(): Patient {
        return $this->patient;
    }
    /**
     * @param string $value
     *
     * @return self Fluent interface
     */
    public function setMeasurement(string $value): self {
        $this->measurement = $value;
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
     * @var string $measurement (cm)
     *
     * @ORM\Column(type="decimal", precision=4, scale=1, nullable=false)
     */
    private $measurement;
    /**
     * @var UnitOfMeasurement|null $measuredIn Unit of measurement used.
     *
     * @ORM\ManyToOne(targetEntity="UnitOfMeasurement")
     * @ORM\JoinColumn(name="measured_in", referencedColumnName="id", nullable=true)
     */
    private $measuredIn;
    /**
     * @var Patient
     *
     * @ORM\ManyToOne(targetEntity="Patient")
     * @ORM\JoinColumn(nullable=false)
     */
    private $patient;
}
