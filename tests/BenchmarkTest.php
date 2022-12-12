<?php

declare(strict_types=1);

use function Awilum\CraftBenchmark\benchmarkStart;
use function Awilum\CraftBenchmark\benchmarkEnd;
use function Awilum\CraftBenchmark\benchmarkSummary;
use function Awilum\CraftBenchmark\benchmarkFlush;
use function Awilum\CraftBenchmark\benchmarkDelete;

test('benchmark functions', function (): void {

    // start, end, summary
    benchmarkStart('foo');
    benchmarkEnd('foo');
    
    $summary = benchmarkSummary();

    expect($summary)->toBeArray();
    expect($summary)->toHaveKey('foo');
    expect($summary)->toHaveKey('foo.time');
    expect($summary)->toHaveKey('foo.time.prob_start');
    expect($summary)->toHaveKey('foo.time.prob_end');
    expect($summary)->toHaveKey('foo.time.elapsed');
    expect($summary)->toHaveKey('foo.time.elapsed_formated');
    expect($summary)->toHaveKey('foo.memory.prob_start');
    expect($summary)->toHaveKey('foo.memory.prob_end');
    expect($summary)->toHaveKey('foo.memory.usage');
    expect($summary)->toHaveKey('foo.memory.usage_formated');

    // flush
    benchmarkFlush();
    expect(benchmarkSummary())->toHaveCount(0);

    // delete
    benchmarkStart('bar');
    benchmarkStart('fed');
    benchmarkEnd('fed');
    benchmarkEnd('bar');

    benchmarkDelete('bar');

    expect(benchmarkSummary())->toHaveCount(1);
});
