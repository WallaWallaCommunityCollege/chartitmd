<?php
declare(strict_types=1);
/**
 * Contains class ChartItMDSpec.
 *
 * PHP version 7.2
 *
 * LICENSE:
 * This file is part of ChartItMD.
 * Copyright (C) 2019 ChartItMD Development Group
 *
 * @author    Michael Cummings <mgcummings@yahoo.com>
 * @copyright 2019 ChartItMD Development Group
 * @license   Proprietary
 */

namespace Spec\ChartItMD;

use ChartItMD\ChartItMD;
use ChartItMD\Pdo\Connection;
use ChartItMD\Pdo\ConnectionInterface;
use Doctrine\ORM\EntityManager;
use PhpSpec\ObjectBehavior;

/**
 * Class ChartItMDSpec
 *
 * @mixin ChartItMD
 *
 * @method void during($method, array $params)
 * @method void shouldBe($value)
 * @method void shouldNotEqual($value)
 * @method void shouldReturn($result)
 */
class ChartItMDSpec extends ObjectBehavior {
    public function it_is_initializable(): void {
        $this->shouldHaveType(ChartItMD::class);
    }
    public function it_should_have_cim_base_dir_setting(): void {
        $this->getContainer()
             ->get('ChartItMD.baseDir')
             ->shouldEndWith('chartitmd/');
    }
    public function it_should_have_cim_config_dir_setting(): void {
        $this->getContainer()
             ->get('ChartItMD.configDir')
             ->shouldEndWith('chartitmd/config/');
    }
    public function it_should_have_cim_src_dir_setting(): void {
        $this->getContainer()
             ->get('ChartItMD.srcDir')
             ->shouldEndWith('chartitmd/src/');
    }
    public function it_should_have_correct_pdo_connection_sql_modes(): void {
        $this->getContainer()
             ->get(Connection::class)
             ->query('SELECT @@sql_mode as sql_mode')
             ->fetchColumn()
             ->shouldContain('ANSI');
        $this->getContainer()
             ->get(Connection::class)
             ->query('SELECT @@sql_mode as sql_mode')
             ->fetchColumn()
             ->shouldContain('TRADITIONAL');
    }
    public function it_should_have_doctrine_em_setting(): void {
        $this->getContainer()
             ->get(EntityManager::class)
             ->shouldReturnAnInstanceOf(EntityManager::class);
    }
    public function it_should_have_mode_setting(): void {
        $this->getContainer()
             ->get('mode')
             ->shouldReturn('production');
    }
    public function it_should_have_pdo_connection_setting(): void {
        $this->getContainer()
             ->get(Connection::class)
             ->shouldReturnAnInstanceOf(ConnectionInterface::class);
    }
    public function it_should_have_pdo_db_setting(): void {
        $this->getContainer()
             ->get('ChartItMD.Pdo.Parameters.database')
             ->shouldReturn('chartitmd');
    }
}
