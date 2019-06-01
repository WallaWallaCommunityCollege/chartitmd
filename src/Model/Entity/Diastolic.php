<?php
declare(strict_types=1);
/**
 * Contains class Diastolic.
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
 * Class Diastolic.
 *
 * @ORM\Table(name="diastolic",
 *     indexes={
 *         @ORM\Index(name="idx_created_at", columns={"created_at"})
 *     }
 * )
 * @ORM\Entity(repositoryClass="ChartItMD\Model\Repository\DiastolicRepository")
 */
class Diastolic implements \JsonSerializable {
    use Uuid4Trait;
    use EntityCommon;
    use MeasurementCommon;
    /**
     * Diastolic constructor.
     *
     * @param User    $createdBy
     * @param Patient $patient
     * @param int     $measurement
     *
     * @throws \Exception
     */
    public function __construct(User $createdBy, Patient $patient, int $measurement) {
        $this->createdAt = new \DateTimeImmutable();
        $this->createdBy = $createdBy;
        $this->id = $this->asBase64();
        $this->measurement = $measurement;
        $this->patient = $patient;
    }
    /**
     * @return int
     */
    public function getMeasurement(): int {
        return $this->measurement;
    }
    /**
     * @var int $measurement (bottom number)
     *
     * @ORM\Column(type="smallint", nullable=false, options={"unsigned": true})
     */
    private $measurement;
}
