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

use LogicException;

class Probs
{
    /**
     * Probs
     *
     * @var array
     */
    private static array $probs = [];

    /**
     * Start benchmark prob.
     * 
     * @param string $name prob name
     */
    public static function start(string $name = 'default'): void
    {   
        if (isset(self::$probs[$name])) {
            throw new LogicException("Prob $name already exists.");
        }

        self::$probs[$name]['time']['prob_start'] = microtime(true);
        self::$probs[$name]['memory']['prob_start'] = memory_get_usage();
    }

    /**
     * End benchmark prob.
     * 
     * @param string $name prob name
     */
    public static function end(string $name = 'default'): void
    {
        if (! isset(self::$probs[$name])) {
            throw new LogicException("Prob $name doesn't exists.");
        }

        self::$probs[$name]['time']['prob_end'] = microtime(true);
        self::$probs[$name]['time']['elapsed'] = microtime(true) - self::$probs[$name]['time']['prob_start'];
        
        $format = '%.3f%s';
        $round = 3;

        if (self::$probs[$name]['time']['elapsed'] >= 1) {
            $unit = 's';
            $time = round(self::$probs[$name]['time']['elapsed'], $round);
        } else {
            $unit = 'ms';
            $time = round(self::$probs[$name]['time']['elapsed'] * 1000);
            $format = preg_replace('/(%.[\d]+f)/', '%d', $format);
        }

        self::$probs[$name]['time']['elapsed_formated'] = sprintf($format, $time, $unit);

        self::$probs[$name]['memory']['prob_end'] = memory_get_usage();

        $unit = ['B', 'KB', 'MB', 'GB', 'TiB', 'PiB'];
        $size = self::$probs[$name]['memory']['prob_end'] - self::$probs[$name]['memory']['prob_start'];
        $memory_usage = @round($size/pow(1024, ($i=floor(log($size, 1024)))), 2) . $unit[($i < 0 ? 0 : $i)];
        
        self::$probs[$name]['memory']['usage'] = $size;
        self::$probs[$name]['memory']['usage_formated'] = $memory_usage;
    }

    /**
     * Delete benchmark prob.
     * 
     * @param string $name prob name
     */
    public static function delete(string $name): void
    {
        if (! isset(self::$probs[$name])) {
            throw new LogicException("Prob $name doesn't exists.");
        }

        $probs = self::$probs;
        unset($probs[$name]);
        self::$probs = $probs;
    }

    /**
     * Flush benchmark probs.
     */
    public static function flush(): void
    {
        self::$probs = [];
    }

    /** 
     * Get benchmark summary.
     * 
     * @return array
     */
    public static function summary(): array
    {
        return self::$probs;
    }
}
