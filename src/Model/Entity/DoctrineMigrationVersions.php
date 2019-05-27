<?php
declare(strict_types=1);
/**
 * Contains class DoctrineMigrationVersions.
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

use Doctrine\ORM\Mapping as ORM;

/**
 * Class DoctrineMigrationVersions.
 *
 * @ORM\Table(name="doctrine_migration_versions")
 * @ORM\Entity(readOnly=true)
 */
class DoctrineMigrationVersions {
    /**
     * DoctrineMigrationVersions constructor.
     *
     * NOTE:
     *      This is just a placeholder.
     */
    private function __construct() {
    }
    /**
     * @var \DateTimeImmutable
     *
     * @ORM\Column(name="executed_at", type="datetime_immutable", nullable=false)
     */
    private $executedAt;
    /**
     * @var string
     *
     * @ORM\Column(type="string", length=14, nullable=false)
     * @ORM\Id
     */
    private $version;
}
