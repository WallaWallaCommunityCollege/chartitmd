<?php
declare(strict_types=1);
/**
 * Contains class ForbiddenException.
 *
 * PHP version 7.2+
 *
 * LICENSE:
 * This file is part of ChartItMD.
 * Copyright (C) 2019 ChartItMD Development Group
 *
 * Additional code from {@link https://github.com/potievdev/slim-rbac} with MIT
 * license by Abdulmalik Abdulpotiev.
 *
 * @see       MIT_LICENSE
 * @author    Abdulmalik Abdulpotiev <potievdev@gmail.com>
 *
 * @author    Michael Cummings <mgcummings@yahoo.com>
 * @copyright 2019 ChartItMD Development Group
 * @license   Proprietary
 */

namespace ChartItMD\Exception;

/**
 * Access denied exception
 * Class ForbiddenException
 *
 * @package ChartItMD\Exception
 */
class ForbiddenException extends \Exception {
    protected $message = 'Access denied';
}
