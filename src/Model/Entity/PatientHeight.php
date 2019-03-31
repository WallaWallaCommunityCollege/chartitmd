<?php
declare(strict_types=1);
/**
 * Contains class PatientHeight.
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
 * Class PatientHeight.
 *
 * @ORM\Table(name="patient_height",
 *     indexes={
 *         @ORM\Index(name="fk_patient", columns={"patient_id"}),
 *         @ORM\Index(name="idx_created_at", columns={"created_at"})
 *     }
 * )
 * @ORM\Entity(repositoryClass="ChartItMD\Model\Repository\PatientHeightRepository")
 */
class PatientHeight implements JsonSerializable {
    use Uuid4Trait;
    use EntityCommon;
    /**
     * PatientHeight constructor.
     *
     * @param User    $createdBy
     * @param Patient $patient
     * @param string  $height
     *
     * @throws \Exception
     */
    public function __construct(User $createdBy, Patient $patient, string $height) {
        $this->createdAt = new \DateTimeImmutable();
        $this->createdBy = $createdBy;
        $this->height = $height;
        $this->id = $this->asBase64();
        $this->patient = $patient;
    }
    /**
     * @return string
     */
    public function getHeight(): string {
        return $this->height;
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
    public function setHeight(string $value): self {
        $this->height = $value;
        return $this;
    }
    /**
     * @var string $height (cm)
     *
     * @ORM\Column(type="decimal", precision=4, scale=1, nullable=false)
     */
    private $height;
    /**
     * @var Patient $patient
     *
     * @ORM\ManyToOne(targetEntity="Patient", inversedBy="heights")
     * @ORM\JoinColumn(nullable=false)
     */
    private $patient;
}
