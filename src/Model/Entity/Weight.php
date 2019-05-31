<?php
declare(strict_types=1);
/**
 * Contains class Weight.
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
 * Class Weight.
 *
 * @ORM\Table(name="weight",
 *     indexes={
 *         @ORM\Index(name="idx_created_at", columns={"created_at"})
 *     }
 * )
 * @ORM\Entity(repositoryClass="ChartItMD\Model\Repository\WeightRepository")
 */
class Weight implements \JsonSerializable {
    use EntityCommon;
    use Uuid4Trait;
    /**
     * PatientWeight constructor.
     *
     * @param User    $createdBy
     * @param Patient $patient
     * @param string  $measurement
     *
     * @throws \Exception
     */
    public function __construct(User $createdBy, Patient $patient, string $measurement) {
        $this->patient = $patient;
        $this->measurement = $measurement;
        $this->id = $this->asBase64();
        $this->createdAt = new \DateTimeImmutable();
        $this->createdBy = $createdBy->getId();
    }
    /**
     * @return UnitOfMeasurement|null
     */
    public function getMeasuredIn(): ?UnitOfMeasurement {
        return $this->measuredIn;
    }
    /**
     * @return string
     */
    public function getMeasurement(): string {
        return $this->measurement;
    }
    /**
     * @return Patient
     */
    public function getPatient(): Patient {
        return $this->patient;
    }
    /**
     * @param UnitOfMeasurement $value
     *
     * @return self Fluent interface
     */
    public function setMeasuredIn(?UnitOfMeasurement $value): self {
        $this->measuredIn = $value;
        return $this;
    }
    /**
     * @var UnitOfMeasurement|null $measuredIn Unit of measurement used.
     *
     * @ORM\ManyToOne(targetEntity="UnitOfMeasurement")
     * @ORM\JoinColumn(name="measured_in", referencedColumnName="id", nullable=true)
     */
    private $measuredIn;
    /**
     * @var string $measurement (kg)
     *
     * @ORM\Column(type="decimal", precision=4, scale=1, nullable=false)
     */
    private $measurement;
    /**
     * @var Patient
     *
     * @ORM\ManyToOne(targetEntity="Patient")
     * @ORM\JoinColumn(nullable=false)
     */
    private $patient;
}
