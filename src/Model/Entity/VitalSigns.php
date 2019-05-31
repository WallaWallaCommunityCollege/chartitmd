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
use JsonSerializable;

/**
 * Class VitalSigns.
 *
 * @ORM\Table(name="vital_signs")
 * @ORM\Entity(repositoryClass="ChartItMD\Model\Repository\VitalSignsRepository")
 * @ORM\HasLifecycleCallbacks
 */
class VitalSigns implements JsonSerializable {
    use Uuid4Trait;
    use EntityCommon;
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
     * @return string
     */
    public function getDiastolic(): string {
        return $this->diastolic;
    }
    /**
     * @return Location
     */
    public function getOxygenLocation(): Location {
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
     * @return Location
     */
    public function getPainLocation(): Location {
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
    public function getTemperature(): string {
        return $this->temperature;
    }
    /**
     * @return Method
     */
    public function getTemperatureMethod(): Method {
        return $this->temperatureMethod;
    }
    /**
     * @var string $diastolic (bottom number)
     *
     * @ORM\Column(type="decimal", precision=3, scale=0, nullable=true)
     */
    private $diastolic;
    /**
     * @var Location $oxygenLocation
     *
     * @ORM\ManyToOne(targetEntity="Location")
     * @ORM\JoinColumn(name="oxygen_location", referencedColumnName="id", nullable=true)
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
     * @var Location $painLocation
     *
     * @ORM\ManyToOne(targetEntity="Location")
     * @ORM\JoinColumn(name="pain_location", referencedColumnName="id", nullable=true)
     */
    private $painLocation;
    /**
     * @var Patient
     *
     * @ORM\ManyToOne(targetEntity="Patient")
     * @ORM\JoinColumn(nullable=false)
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
     * @var int|string $systolic (top number)
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
     * @var Method $temperatureMethod
     *
     * @ORM\ManyToOne(targetEntity="Method")
     * @ORM\JoinColumn(name="temperature_method", referencedColumnName="id", nullable=true)
     */
    private $temperatureMethod;
}
