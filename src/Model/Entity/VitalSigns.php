<?php
declare(strict_types=1);
/**
 * Contains class VitalSigns.
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
 * Class VitalSigns.
 *
 * @ORM\Table(name="vital_signs")
 * @ORM\Entity(repositoryClass="ChartItMD\Model\Repository\VitalSignsRepository")
 */
class VitalSigns implements \JsonSerializable {
    use Uuid4Trait;
    use EntityCommon;
    /**
     * VitalSigns constructor.
     *
     * @param User      $createdBy
     * @param Patient   $patient
     * @param Diastolic $diastolic
     * @param Systolic  $systolic
     *
     * @throws \Exception
     */
    public function __construct(User $createdBy, Patient $patient, Diastolic $diastolic, Systolic $systolic) {
        $this->patient = $patient;
        $this->id = $this->asBase64();
        $this->createdAt = new \DateTimeImmutable();
        $this->createdBy = $createdBy;
        $this->diastolic = $diastolic;
        $this->systolic = $systolic;
    }
    /**
     * @return Diastolic
     */
    public function getDiastolic(): Diastolic {
        return $this->diastolic;
    }
    /**
     * @return OxygenSaturation|null
     */
    public function getOxygenSaturation(): ?OxygenSaturation {
        return $this->oxygenSaturation;
    }
    /**
     * @return Pain|null
     */
    public function getPain(): ?Pain {
        return $this->pain;
    }
    /**
     * @return Patient
     */
    public function getPatient(): Patient {
        return $this->patient;
    }
    /**
     * @return Pulse|null
     */
    public function getPulse(): ?Pulse {
        return $this->pulse;
    }
    /**
     * @return Respiration|null
     */
    public function getRespiration(): ?Respiration {
        return $this->respiration;
    }
    /**
     * @return Systolic
     */
    public function getSystolic(): Systolic {
        return $this->systolic;
    }
    /**
     * @return Temperature|null
     */
    public function getTemperature(): ?Temperature {
        return $this->temperature;
    }
    /**
     * @param OxygenSaturation|null $value
     *
     * @return self Fluent interface
     */
    public function setOxygenSaturation(?OxygenSaturation $value): self {
        $this->oxygenSaturation = $value;
        return $this;
    }
    /**
     * @param Pain|null $value
     *
     * @return self Fluent interface
     */
    public function setPain(?Pain $value): self {
        $this->pain = $value;
        return $this;
    }
    /**
     * @param Pulse|null $value
     *
     * @return self Fluent interface
     */
    public function setPulse(?Pulse $value): self {
        $this->pulse = $value;
        return $this;
    }
    /**
     * @param Respiration|null $value
     *
     * @return self Fluent interface
     */
    public function setRespiration(?Respiration $value): self {
        $this->respiration = $value;
        return $this;
    }
    /**
     * @param Temperature|null $value
     *
     * @return self Fluent interface
     */
    public function setTemperature(?Temperature $value): self {
        $this->temperature = $value;
        return $this;
    }
    /**
     * @var Diastolic
     *
     * @ORM\OneToOne(targetEntity="Diastolic")
     * @ORM\JoinColumn(nullable=false)
     */
    private $diastolic;
    /**
     * @var OxygenSaturation|null
     *
     * @ORM\OneToOne(targetEntity="OxygenSaturation")
     * @ORM\JoinColumn(name="oxygen_saturation_id", nullable=true)
     */
    private $oxygenSaturation;
    /**
     * @var Pain|null
     *
     * @ORM\OneToOne(targetEntity="Pain")
     * @ORM\JoinColumn(nullable=true)
     */
    private $pain;
    /**
     * @var Patient
     *
     * @ORM\ManyToOne(targetEntity="Patient")
     * @ORM\JoinColumn(nullable=false)
     */
    private $patient;
    /**
     * @var Pulse|null
     *
     * @ORM\OneToOne(targetEntity="Pulse")
     * @ORM\JoinColumn(nullable=true)
     */
    private $pulse;
    /**
     * @var Respiration|null
     *
     * @ORM\OneToOne(targetEntity="Respiration")
     * @ORM\JoinColumn(nullable=true)
     */
    private $respiration;
    /**
     * @var Systolic
     *
     * @ORM\OneToOne(targetEntity="Systolic")
     * @ORM\JoinColumn(nullable=false)
     */
    private $systolic;
    /**
     * @var Temperature|null
     *
     * @ORM\OneToOne(targetEntity="Temperature")
     * @ORM\JoinColumn(nullable=true)
     */
    private $temperature;
}
