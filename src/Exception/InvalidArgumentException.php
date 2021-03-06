<?php
declare(strict_types=1);
/**
 * Contains class InvalidArgumentException.
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
 * Throws when pass incorrect type argument to function
 * Class InvalidArgumentException
 *
 * @package ChartItMD\Exception
 */
class InvalidArgumentException extends \Exception {
    protected $message = 'The invalid argument passed';
}
