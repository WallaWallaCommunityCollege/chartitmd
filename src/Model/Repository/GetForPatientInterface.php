<?php
declare(strict_types=1);
/**
 * Contains interface GetForPatient.
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

/**
 * Interface GetForPatient.
 */
interface GetForPatientInterface {
    /**
     * @param string $patientId
     *
     * @return array|null
     */
    public function getForPatientId(string $patientId): ?array;
}
