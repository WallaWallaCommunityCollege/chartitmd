<?php
declare(strict_types=1);
/**
 * Contains class %name%.
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
namespace %namespace%;
use %subject%;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
/**
* Class %name%
*
* @mixin %subject_class%
*
* @method void during($method, array $params)
* @method void shouldBe($value)
* @method void shouldNotEqual($value)
* @method void shouldReturn($result)
*/
class %name% extends ObjectBehavior {
public function it_is_initializable(): void {
$this->shouldHaveType('%subject_class%::class');
}
}
