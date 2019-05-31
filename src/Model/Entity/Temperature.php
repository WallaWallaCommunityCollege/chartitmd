<?php
declare(strict_types=1);
/**
 * Contains class Temperature.
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
 * Class Temperature.
 *
 * @ORM\Table(name="temperature",
 *     indexes={
 *         @ORM\Index(name="idx_created_at", columns={"created_at"})
 *     }
 * )
 * @ORM\Entity(repositoryClass="ChartItMD\Model\Repository\TemperatureRepository")
 * @ORM\HasLifecycleCallbacks
 */
class Temperature implements \JsonSerializable {
    use EntityCommon;
    use MeasurementCommon;
    use Uuid4Trait;
    /**
     * Temperature constructor.
     *
     * @param User    $createdBy
     * @param Patient $patient
     * @param string  $temperature
     *
     * @throws \Exception
     */
    public function __construct(User $createdBy, Patient $patient, string $temperature) {
        $this->createdAt = new \DateTimeImmutable();
        $this->createdBy = $createdBy;
        $this->id = $this->asBase64();
        $this->patient = $patient;
        $this->temperature = $temperature;
    }
    /**
     * @return string
     */
    public function getTemperature(): string {
        return $this->temperature;
    }
    /**
     * @var string
     *
     * @ORM\Column(type="decimal", precision=4, scale=1, nullable=true)
     */
    private $temperature;
}
