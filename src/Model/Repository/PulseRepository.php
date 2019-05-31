<?php
declare(strict_types=1);
/**
 * Contains class PulseRepository.
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

namespace ChartItMD\Model\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * Class PulseRepository.
 */
class PulseRepository extends EntityRepository {
    /**
     * @param string $id
     */
    public function getPulseRateById(string $id) {
        //TODO
    }
    /**
     * @param string $id
     */
    public function getPulseRatesForPatientId(string $id) {
        //TODO
    }
}
