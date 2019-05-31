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
use Doctrine\ORM\Mapping as ORM;

/**
 * Class BloodPressure.
 *
 * @ORM\Table(name="blood_pressure",
 *     indexes={
 *         @ORM\Index(name="idx_created_at", columns={"created_at"})
 *     }
 * )
 * @ORM\Entity(repositoryClass="ChartItMD\Model\Repository\BloodPressureRepository")
 */
class BloodPressure implements \JsonSerializable {
    use Uuid4Trait;
    use EntityCommon;
    use MeasurementCommon;
    /**
     * BloodPressure constructor.
     *
     * @param User    $createdBy
     * @param Patient $patient
     * @param int     $diastolic
     * @param int     $systolic
     *
     * @throws \Exception
     */
    public function __construct(User $createdBy, Patient $patient, int $diastolic, int $systolic) {
        $this->createdAt = new \DateTimeImmutable();
        $this->createdBy = $createdBy;
        $this->diastolic = $diastolic;
        $this->id = $this->asBase64();
        $this->patient = $patient;
        $this->systolic = $systolic;
    }
    /**
     * @return int
     */
    public function getDiastolic(): int {
        return $this->diastolic;
    }
    /**
     * @return int
     */
    public function getSystolic(): int {
        return $this->systolic;
    }
    /**
     * @var int $diastolic (bottom number)
     *
     * @ORM\Column(type="smallint", nullable=false, options={"unsigned": true})
     */
    private $diastolic;
    /**
     * @var int $systolic (top number)
     *
     * @ORM\Column(type="smallint", nullable=false, options={"unsigned": true})
     */
    private $systolic;
}
