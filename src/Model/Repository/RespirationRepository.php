<?php
declare(strict_types=1);
/**
 * Contains class RespirationRepository.
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
 * Class RespirationRepository.
 */
class RespirationRepository extends EntityRepository implements GetForPatientInterface {
    use GetForPatientTrait;
    use ArrayExceptionCommon;
}
