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

namespace CraftPlugins\Benchmark;

use CraftPlugins\Benchmark\Probs;

/**
 * Start benchmark prob.
 * 
 * @param string $name prob name
 */
function benchmarkStart(string $name = 'default'): void
{
    Prob::start($name);
}

/**
 * End benchmark prob.
 * 
 * @param string $name prob name
 */
function benchmarkEnd(string $name = 'default'): void
{
    Prob::end($name);
}

/**
 * End benchmark prob.
 * 
 * @param string $name prob name
 */
function benchmarkDelete(string $name = 'default'): void
{
    Prob::delete($name);
}

/**
 * Flush benchmark probs.
 */
function benchmarkFlush(): void
{
    Prob::flush();
}


/** 
 * Get benchmark summary.
 * 
 * @return array
 */
function benchmarkSummary(): array
{
    return Prob::summary();
}
