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

/**
 * Class PatientHeight.
 *
 * @ORM\Table(name="patient_height", indexes={@ORM\Index(name="fk_patient_id", columns={"patient_id"})})
 * @ORM\Entity
 * Todo Need to add repository.
 */
class PatientHeight {
    use Uuid4Trait;
    /**
     * PatientHeight constructor.
     *
     * @param Patient $patient
     * @param string  $height
     *
     * @throws \Exception
     */
    public function __construct(Patient $patient, string $height) {
        $this->patient = $patient;
        $this->height = $height;
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
     * @var string $height (cm)
     *
     * @ORM\Column(type="decimal", precision=4, scale=1, nullable=false)
     */
    private $height;
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
     * @var Patient $patient
     *
     * @ORM\ManyToOne(targetEntity="Patient", inversedBy="heights")
     * @ORM\JoinColumn(name="patient_id", referencedColumnName="id", nullable=false)
     */
    private $patient;
}
