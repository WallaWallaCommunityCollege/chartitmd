<?php
declare(strict_types=1);
/**
 * Contains class AuthOptions.
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

namespace ChartItMD\Structure;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;

/**
 * Authorization manager options structure.
 * The instance of this class accepted as argument for constructor of AuthManager
 * Class AuthOptions
 *
 * @package Potievdev\Structure
 */
class AuthOptions {
    public const ATTRIBUTE_STORAGE_TYPE = 1;
    public const COOKIE_STORAGE_TYPE = 3;
    /** Default field name */
    public const DEFAULT_VARIABLE_NAME = 'userId';
    public const HEADER_STORAGE_TYPE = 2;
    /**
     * @return EntityManager
     */
    public function getEntityManager(): EntityManagerInterface {
        return $this->entityManager;
    }
    /**
     * @return string
     */
    public function getVariableName(): string {
        return $this->variableName;
    }
    /**
     * @return int
     */
    public function getVariableStorageType(): int {
        return $this->variableStorageType;
    }
    /**
     * @param EntityManagerInterface $entityManager
     */
    public function setEntityManager(EntityManagerInterface $entityManager): void {
        $this->entityManager = $entityManager;
    }
    /**
     * @param string $variableName
     */
    public function setVariableName(string $variableName): void {
        $this->variableName = $variableName;
    }
    /**
     * @param int $variableStorageType
     */
    public function setVariableStorageType(int $variableStorageType): void {
        $this->variableStorageType = $variableStorageType;
    }
    /**
     * @var  EntityManagerInterface
     */
    private $entityManager;
    /**
     * @var string $variableName variable name which saves user identifier
     */
    private $variableName = self::DEFAULT_VARIABLE_NAME;
    /**
     * @var int $variableStorageType Type of storage where saves variable value
     */
    private $variableStorageType = self::ATTRIBUTE_STORAGE_TYPE;
}
