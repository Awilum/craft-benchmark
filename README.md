<h1 align="center">Benchmark plugin for <a href="https://github.com/craftcms">Craft CMS</a></h1>

<p align="center">
<img src="https://img.shields.io/badge/license-MIT-blue.svg?label=License" alt="License MIT"> <img alt="GitHub Repo stars" src="https://img.shields.io/github/stars/craft-plugins/benchmark?label=Stars"> <img alt="GitHub forks" src="https://img.shields.io/github/forks/craft-plugins/benchmark?label=Forks"> <a href="https://hitsofcode.com"><img alt="Hits of Code" src="https://hitsofcode.com/github/craft-plugins/benchmark?branch=1.x"></a>
</p>

Simple benchmark plugin with basic functionality for benchmarking.

## Requirements

* **Craft CMS**: ^4.0
* **PHP**: ^8.1

## Installation

To install the plugin, follow these instructions.

1. Open your terminal and go to your Craft project:
    ```
    cd /path/to/project
    ```

2. In your terminal run `composer require craft-plugins/benchmark`.

3. In the Control Panel, go to Settings → Plugins and click the “Install” button for Benchmark.

### Usage

Display benchmark file size in the twig tempalates:

```
//=> 1 MB
{{ benchmarkFileSize(1000000) }}

//=> 976.56 KiB
{{ benchmarkFileSize(1000000, false) }}

//=> 1 MB
{{ 1000000 | benchmarkFileSize }}

//=> 976.56 KiB
{{ 1000000 | benchmarkFileSize(false) }}
```

Display benchmark number in the twig tempalates:

```
//=> 10,050,050
{{ benchmarkNumber(10050050) }}

//=> 10,050,050.00
{{ benchmarkNumber(10050050, 2) }}

//=> 10,050,050/00
{{ benchmarkNumber(10050050, 2, '/') }}

//=> 10:050:050/00
{{ benchmarkNumber(10050050, 2, '/', ':') }}

//=> 10,050,050
{{ 10050050 | benchmarkNumber() }}

//=> 10,050,050.00
{{ 10050050 | benchmarkNumber(2) }}

//=> 10,050,050/00
{{ 10050050 | benchmarkNumber(2, '/') }}

//=> 10:050:050/00
{{ 10050050 | benchmarkNumber(2, '/', ':') }}
```

Display benchmark date time in the twig tempalates:

```
//=> November 23, 2022, 4:24 am
{{ benchmarkDateTime(1669177469) }}

//=> November 23, 2022, 4:24 am
{{ 1669177469 | benchmarkDateTime }}
```

Display benchmark file name in the twig tempalates:

```
//=> foo-bar
{{ benchmarkFileName('foo bar') }}

//=> foo-bar
{{ 'foo bar' | benchmarkFileName }}
```

Use Benchmark `benchmarkDateTime` function in the PHP:

```php
use function CraftPlugins\Benchmark\benchmarkDateTime;

echo benchmarkDateTime(1669177469);
```

## LICENSE
[The MIT License (MIT)](https://github.com/craft-plugins/benchmark/blob/master/LICENSE.md)
Copyright (c) [Sergey Romanenko](https://awilum.github.io/)
