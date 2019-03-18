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

/**
 * Class BloodPressure.
 */
class BloodPressure {
    use Uuid4Trait;
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
     * @var Location $locationUsed
     *
     * @ORM\OneToMany(targetEntity="BloodPressure", mappedBy="patient")
     */
    private $locationUsed;
    /**
     * @var UnitOfMeasurement $measuredIn Unit of measurement used.
     *
     * @ORM\OneToMany(targetEntity="BloodPressure", mappedBy="patient")
     */
    private $measuredIn;
    /**
     * @var Method $methodUsed
     *
     * @ORM\OneToMany(targetEntity="Method", mappedBy="patient")
     */
    private $methodUsed;
    /**
     * @var Patient $patient
     *
     * @ORM\ManyToOne(targetEntity="Patient", inversedBy="BloodPressure")
     * @ORM\JoinColumn(name="patient_id", referencedColumnName="id", nullable=false)
     */
    private $patient;
    /**
     * @var string $systolic (top number)
     *
     * @ORM\Column(type="decimal", precision=3, scale=0, nullable=true)
     */
    private $systolic;
}
