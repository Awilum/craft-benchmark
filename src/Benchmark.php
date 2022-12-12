<?php

/*
 * This file is part of the Benchmark plugin.
 *
 * (c) Sergey Romanenko <awilum@msn.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Awilum\CraftBenchmark;

use Craft;
use craft\base\Plugin;
use Awilum\CraftBenchmark\BenchmarkTwigExtension;

class Benchmark extends Plugin
{
    public function init()
    {
        parent::init();
        Craft::$app->view->registerTwigExtension(new BenchmarkTwigExtension());
    }
}