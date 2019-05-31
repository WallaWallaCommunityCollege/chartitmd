<?php
declare(strict_types=1);
/**
 * Contains class Pain.
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
 * Class Pain.
 *
 * @ORM\Table(name="pain",
 *     indexes={
 *         @ORM\Index(name="idx_created_at", columns={"created_at"})
 *     }
 * )
 * @ORM\Entity(repositoryClass="ChartItMD\Model\Repository\PainRepository")
 * @ORM\HasLifecycleCallbacks
 */
class Pain implements \JsonSerializable {
    use Uuid4Trait;
    use EntityCommon;
    /**
     * Pain constructor.
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
        $this->patient = $patient;
        $this->measurement = $measurement;
    }
    /**
     * @return Location|null
     */
    public function getLocation(): ?Location {
        return $this->location;
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
    public function getMeasurement(): int {
        return $this->measurement;
    }
    /**
     * @param Location|null $value
     *
     * @return self Fluent interface
     */
    public function setLocation(?Location $value): self {
        $this->location = $value;
        return $this;
    }
    /**
     * @var Location|null $location
     *
     * @ORM\ManyToOne(targetEntity="Location")
     * @ORM\JoinColumn(nullable=true)
     */
    private $location;
    /**
     * @var Patient
     *
     * @ORM\ManyToOne(targetEntity="Patient")
     * @ORM\JoinColumn(nullable=false)
     */
    private $patient;
    /**
     * @var int $measurement
     *
     * @ORM\Column(type="smallint", nullable=false, options={"unsigned": true})
     */
    private $measurement;
}
