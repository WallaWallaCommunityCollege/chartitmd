<?php
declare(strict_types=1);
/**
 * Contains class OxygenSaturation.
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
 * Class OxygenSaturation.
 *
 * @ORM\Table(name="oxygen_saturation",
 *     indexes={
 *         @ORM\Index(name="fk_patient", columns={"patient_id"}),
 *         @ORM\Index(name="idx_created_at", columns={"created_at"})
 *     }
 * )
 * @ORM\Entity(repositoryClass="ChartItMD\Model\Repository\OxygenSaturationRepository")
 * @ORM\HasLifecycleCallbacks
 */
class OxygenSaturation implements \JsonSerializable {
    use Uuid4Trait;
    use EntityCommon;
    use MeasurementCommon;
    /**
     * Pain constructor.
     *
     * @param User    $createdBy
     * @param Patient $patient
     * @param int     $saturation
     *
     * @throws \Exception
     */
    public function __construct(User $createdBy, Patient $patient, int $saturation) {
        $this->createdAt = new \DateTimeImmutable();
        $this->createdBy = $createdBy;
        $this->id = $this->asBase64();
        $this->patient = $patient;
        $this->saturation = $saturation;
    }
    /**
     * @return int
     */
    public function getSaturation(): int {
        return $this->saturation;
    }
    /**
     * @var int $saturation Peripheral oxygen saturation (SpO2) as %.
     *
     * @ORM\Column(type="smallint", nullable=false, options={"unsigned": true})
     */
    private $saturation;
}
