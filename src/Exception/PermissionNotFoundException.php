<?php
declare(strict_types=1);
/**
 * Contains class PermissionNotFoundException.
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
 * Permission not found in database exception
 * Class PermissionNotFoundException
 *
 * @package ChartItMD\Exception
 */
class PermissionNotFoundException extends \Exception {
    protected $message = 'Permission not found.';
}
