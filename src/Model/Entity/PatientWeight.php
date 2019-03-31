<?php
declare(strict_types=1);
/**
 * Contains class PatientWeight.
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
 * Class PatientWeight.
 *
 * @ORM\Table(name="patient_weight", indexes={
 *     @ORM\Index(name="fk_patient", columns={"patient_id"}),
 *     @ORM\Index(name="idx_created_at", columns={"created_at"})
 * })
 * @ORM\Entity(repositoryClass="ChartItMD\Model\Repository\PatientWeightRepository")
 */
class PatientWeight implements JsonSerializable {
    use Uuid4Trait;
    use EntityCommon;
    /**
     * PatientWeight constructor.
     *
     * @param User    $createdBy
     * @param Patient $patient
     * @param string  $weight
     *
     * @throws \Exception
     */
    public function __construct(User $createdBy, Patient $patient, string $weight) {
        $this->patient = $patient;
        $this->weight = $weight;
        $this->id = $this->asBase64();
        $this->createdAt = new \DateTimeImmutable();
        $this->createdBy = $createdBy->getId();
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
    public function getWeight(): string {
        return $this->weight;
    }
    /**
     * @var Patient $patient
     *
     * @ORM\ManyToOne(targetEntity="Patient", inversedBy="weights")
     * @ORM\JoinColumn(nullable=false)
     */
    private $patient;
    /**
     * @var string $weight (kg)
     *
     * @ORM\Column(type="decimal", precision=4, scale=1, nullable=false)
     */
    private $weight;
}
