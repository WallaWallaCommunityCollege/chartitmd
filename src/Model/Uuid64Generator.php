<?php
declare(strict_types=1);
/**
 * Contains class Uuid64Generator.
 *
 * PHP version 7.0+
 *
 * LICENSE:
 * This file is part of ChartItMD.
 * Copyright (C) 2019 ChartItMD Development Group
 *
 * @author    Michael Cummings <mgcummings@yahoo.com>
 * @copyright 2019 ChartItMD Development Group
 * @license   Proprietary
 */

namespace ChartItMD\Model;

use ChartItMD\Utils\Uuid4Trait;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Id\AbstractIdGenerator;

/**
 * Class Uuid64Generator.
 */
class Uuid64Generator extends AbstractIdGenerator {
    use Uuid4Trait;
    /**
     * Generates an identifier for an entity.
     *
     * @param EntityManager $em
     * @param object|null   $entity
     *
     * @return mixed
     * @throws \Exception
     */
    public function generate(EntityManager $em, $entity) {
        return $this->asBase64();
    }
}
