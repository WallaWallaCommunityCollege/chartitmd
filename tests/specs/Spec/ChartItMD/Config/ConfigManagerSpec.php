<?php
declare(strict_types=1);
/**
 * Contains class ConfigManagerSpec.
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

namespace Spec\ChartItMD\Config;

use ChartItMD\Config\ConfigManager;
use PhpSpec\ObjectBehavior;

/**
 * Class ConfigManagerSpec
 *
 * @mixin ConfigManager
 *
 * @method void during($method, array $params)
 * @method void shouldBe($value)
 * @method void shouldContain($value)
 * @method void shouldNotEqual($value)
 * @method void shouldReturn($result)
 */
class ConfigManagerSpec extends ObjectBehavior
{
    public function it_is_initializable(): void
    {
        $this->shouldHaveType(ConfigManager::class);
    }
}
