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

use Twig\Environment;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;
use Twig\TwigFilter;
use Twig_Extension;
use CraftPlugins\Benchmark\Benchmark;

class BenchmarkTwigExtension extends AbstractExtension
{
	/**
	 * Get Name
	 *
	 * @return string
	 */
	public function getName()
	{
		return 'Benchmark';
	}

	/**
	 * Get Functions
	 *
	 * @return array
	 */
	public function getFunctions()
	{
		return [
			new TwigFunction('benchmarkStart', fn(string $name = 'default') => benchmarkStart($name)),
			new TwigFunction('benchmarkEnd', fn(string $name = 'default') => benchmarkEnd($name)),
			new TwigFunction('benchmarkDelete', fn(string $name = 'default') => benchmarkDelete($name)),
			new TwigFunction('benchmarkFlush', fn() => benchmarkFlush()),
			new TwigFunction('benchmarkSummary', fn() => benchmarkSummary())
		];
	}
}