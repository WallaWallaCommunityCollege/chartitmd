<?php
declare(strict_types=1);
/**
 * Contains trait ArrayExceptionCommon.
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
 * Trait ArrayExceptionCommon.
 */
trait ArrayExceptionCommon {
    /**
     * @param \Throwable $thrown
     *
     * @return array
     */
    public function exceptionAsArray(\Throwable $thrown): array {
        return [
            'error' => [
                'message' => $thrown->getMessage(),
                'code' => $thrown->getCode(),
                'file' => $thrown->getFile(),
                'line' => $thrown->getLine(),
                'trace' => $thrown->getTrace(),
            ],
        ];
    }
}
