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
 * @ORM\Table(name="vital_signs", indexes={@ORM\Index(name="fk_patient_id", columns={"patient_id"})})
 * @ORM\Entity
 *
 *
 * @ORM\Entity(repositoryClass="ChartItMD\Model\Repository\VitalSignsRepository")
 */
class VitalSigns {
    use Uuid4Trait;
    /**
     * VitalSigns constructor.
     *
     * @param User    $createdBy
     * @param Patient $patient
     *
     * @throws \Exception
     */
    public function __construct(User $createdBy, Patient $patient) {
        $this->patient = $patient;
        $this->id = $this->asBase64();
        $this->createdAt = new \DateTimeImmutable();
        $this->createdBy = $createdBy;
    }
    /**
     * @return \DateTimeImmutable
     */
    public function getCreatedAt(): \DateTimeImmutable {
        return $this->createdAt;
    }
    /**
     * @return User
     */
    public function getCreatedBy(): User {
        return $this->createdBy;
    }
    /**
     * @return string
     */
    public function getDiastolic(): string {
        return $this->diastolic;
    }
    /**
     * @return string
     */
    public function getId(): string {
        return $this->id;
    }
    /**
     * @return string
     */
    public function getOxygenLocation(): string {
        return $this->oxygenLocation;
    }
    /**
     * @return int
     */
    public function getOxygenSaturation(): int {
        return $this->oxygenSaturation;
    }
    /**
     * @return int
     */
    public function getPain(): int {
        return $this->pain;
    }
    /**
     * @return string
     */
    public function getPainLocation(): string {
        return $this->painLocation;
    }
    /**
     * @return Patient
     */
    public function getPatient(): Patient {
        return $this->patient;
    }
    /**
     * @return int
     */
    public function getPulseRate(): int {
        return $this->pulseRate;
    }
    /**
     * @return int
     */
    public function getRespirationRate(): int {
        return $this->respirationRate;
    }
    /**
     * @return string
     */
    public function getSystolic(): string {
        return $this->systolic;
    }
    /**
     * @return string
     */
    public function getTemperature(): string {
        return $this->temperature;
    }
    /**
     * @return string
     */
    public function getTemperatureMethod(): string {
        return $this->temperatureMethod;
    }
    /**
     * @var \DateTimeImmutable
     *
     * @ORM\Column(name="created_at", type="datetime", nullable=false)
     */
    private $createdAt;
    /**
     * @var User $createdBy
     *
     * @ORM\Column(name="created_by", type="uuid64", nullable=false)
     * @ORM\ManyToOne(targetEntity="User")
     */
    private $createdBy;
    /**
     * @var string $diastolic (bottom number)
     *
     * @ORM\Column(type="decimal", precision=3, scale=0, nullable=true)
     */
    private $diastolic;
    /**
     * @var string
     *
     * @ORM\Column(type="uuid64", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="CUSTOM")
     * @ORM\CustomIdGenerator(class="ChartItMD\Model\Uuid64Generator")
     */
    private $id;
    /**
     * @var string
     *
     * @ORM\Column(name="oxygen_location", type="string", length=20, nullable=true, options={"fixed": true})
     */
    private $oxygenLocation;
    /**
     * @var int $oxygenSaturation Peripheral oxygen saturation (SpO2) as %.
     *
     * @ORM\Column(name="oxygen_saturation", type="smallint", nullable=true, options={"unsigned": true})
     */
    private $oxygenSaturation;
    /**
     * @var int $pain
     *
     * @ORM\Column(type="smallint", nullable=true, options={"unsigned": true})
     */
    private $pain;
    /**
     * @var string
     *
     * @ORM\Column(name="pain_location", type="string", length=20, nullable=true, options={"fixed": true})
     */
    private $painLocation;
    /**
     * @var Patient $patient
     *
     * @ORM\ManyToOne(targetEntity="Patient", inversedBy="vitalSigns")
     * @ORM\JoinColumn(name="patient_id", referencedColumnName="id", nullable=false)
     */
    private $patient;
    /**
     * @var int $pulseRate Beat Per Minute (BPM).
     *
     * @ORM\Column(name="pulse_rate", type="smallint", nullable=true, options={"unsigned": true})
     */
    private $pulseRate;
    /**
     * @var int $respirationRate
     *
     * @ORM\Column(name="respiration_rate", type="smallint", nullable=true, options={"unsigned": true})
     */
    private $respirationRate;
    /**
     * @var string $systolic (top number)
     *
     * @ORM\Column(type="decimal", precision=3, scale=0, nullable=true)
     */
    private $systolic;
    /**
     * @var string
     *
     * @ORM\Column(type="decimal", precision=4, scale=1, nullable=true)
     */
    private $temperature;
    /**
     * @var string
     *
     * @ORM\Column(name="temperature_method", type="string", length=20, nullable=true, options={"fixed": true})
     */
    private $temperatureMethod;
}
