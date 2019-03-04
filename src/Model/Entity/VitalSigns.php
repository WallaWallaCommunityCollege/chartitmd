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
 * Todo Need to add repository.
 */
class VitalSigns {
    use Uuid4Trait;
    /**
     * VitalSigns constructor.
     *
     * @param Patient $patient
     *
     * @throws \Exception
     */
    public function __construct(Patient $patient) {
        $this->patient = $patient;
        $this->id = $this->asBase64();
        $this->createdAt = new \DateTimeImmutable();
    }
    /**
     * @var \DateTimeImmutable
     *
     * @ORM\Column(name="created_at", type="datetime", nullable=false)
     */
    private $createdAt;
    /**
     * @var string $diastolic (bottom number)
     *
     * @ORM\Column(type="decimal", precision=3, scale=0, nullable=false)
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
     * @ORM\Column(name="oxygen_location", type="string", length=20, nullable=false, options={"fixed": true})
     */
    private $oxygenLocation;
    /**
     * @var int $oxygenSaturation Peripheral oxygen saturation (SpO2) as %.
     *
     * @ORM\Column(name="oxygen_saturation", type="smallint", nullable=false, options={"unsigned": true})
     */
    private $oxygenSaturation;
    /**
     * @var int $pain
     *
     * @ORM\Column(type="smallint", nullable=false, options={"unsigned": true})
     */
    private $pain;
    /**
     * @var string
     *
     * @ORM\Column(name="pain_location", type="string", length=20, nullable=false, options={"fixed": true})
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
     * @ORM\Column(name="pulse_rate", type="smallint", nullable=false, options={"unsigned": true})
     */
    private $pulseRate;
    /**
     * @var int $respirationRate
     *
     * @ORM\Column(name="respiration_rate", type="smallint", nullable=false, options={"unsigned": true})
     */
    private $respirationRate;
    /**
     * @var string $systolic (top number)
     *
     * @ORM\Column(type="decimal", precision=3, scale=0, nullable=false)
     */
    private $systolic;
    /**
     * @var string
     *
     * @ORM\Column(type="decimal", precision=4, scale=1, nullable=false)
     */
    private $temperature;
    /**
     * @var string
     *
     * @ORM\Column(name="temperature_method", type="string", length=20, nullable=false, options={"fixed": true})
     */
    private $temperatureMethod;
}
