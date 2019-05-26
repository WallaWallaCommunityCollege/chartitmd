<?php
declare(strict_types=1);
/**
 * Contains trait DAndNCommon.
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

/**
 * Trait DAndNCommon.
 */
trait DAndNCommon {
    /**
     * @return string
     */
    public function getDescription(): string {
        return $this->description;
    }
    /**
     * @return string
     */
    public function getName(): string {
        return $this->name;
    }
    /**
     * @param string $value
     */
    public function setDescription(string $value): void {
        $this->description = $value;
    }
    /**
     * @var string
     *
     * @ORM\Column(type="string", nullable=true)
     */
    private $description;
    /**
     * @var string
     *
     * @ORM\Column(type="string", length=50, nullable=false, unique=true)
     */
    private $name;
}
