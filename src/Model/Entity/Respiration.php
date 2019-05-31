<?php
declare(strict_types=1);
/**
 * Contains class Respiration.
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
 * Class Respiration.
 *
 * @ORM\Table(name="respiration",
 *     indexes={
 *         @ORM\Index(name="fk_patient", columns={"patient_id"}),
 *         @ORM\Index(name="idx_created_at", columns={"created_at"})
 *     }
 * )
 * @ORM\Entity(repositoryClass="ChartItMD\Model\Repository\PulseRepository")
 * @ORM\HasLifecycleCallbacks
 */
class Respiration implements \JsonSerializable {
    use EntityCommon;
    use MeasurementCommon;
    use Uuid4Trait;
    /**
     * Respiration constructor.
     *
     * @param User    $createdBy
     * @param Patient $patient
     * @param int     $rate
     *
     * @throws \Exception
     */
    public function __construct(User $createdBy, Patient $patient, int $rate) {
        $this->createdAt = new \DateTimeImmutable();
        $this->createdBy = $createdBy;
        $this->id = $this->asBase64();
        $this->patient = $patient;
        $this->rate = $rate;
    }
    /**
     * @return int
     */
    public function getRate(): int {
        return $this->rate;
    }
    /**
     * @var int $rate Breaths Per Minute (BPM).
     *
     * @ORM\Column(type="smallint", nullable=false, options={"unsigned": true})
     */
    private $rate;
}
