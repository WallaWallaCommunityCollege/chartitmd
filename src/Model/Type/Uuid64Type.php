<?php
declare(strict_types=1);
/**
 * Contains class Uuid64Type.
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

namespace ChartItMD\Model\Type;

use Doctrine\DBAL\DBALException;
use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\BinaryType;

/**
 * Custom doctrine UUID v4 (random) datatype using custom base 64 encoding.
 */
class Uuid64Type extends BinaryType {
    /**
     * Gets the name of this type.
     *
     * This is the name you will need in Doctrine ORM to use the type.
     *
     * @return string
     */
    public function getName(): string {
        return 'uuid64';
    }
    /**
     * {@inheritdoc}
     *
     * @throws DBALException
     */
    public function getSQLDeclaration(array $fieldDeclaration, AbstractPlatform $platform): string {
        $fieldDeclaration['length'] = 22;
        $fieldDeclaration['fixed'] = true;
        return parent::getSQLDeclaration($fieldDeclaration, $platform);
    }
    /**
     * Force SQL comment containing DC2Type so Doctrine reverse engineering works correctly.
     *
     * @param AbstractPlatform $platform
     *
     * @return bool
     */
    public function requiresSQLCommentHint(AbstractPlatform $platform): bool {
        return true;
    }
}
