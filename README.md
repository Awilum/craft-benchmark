<h1 align="center">Benchmark plugin for <a href="https://github.com/craftcms">Craft CMS</a></h1>

<p align="center">
<img src="https://img.shields.io/badge/license-MIT-blue.svg?label=License" alt="License MIT"> <img alt="GitHub Repo stars" src="https://img.shields.io/github/stars/craft-plugins/benchmark?label=Stars"> <img alt="GitHub forks" src="https://img.shields.io/github/forks/craft-plugins/benchmark?label=Forks"> <a href="https://hitsofcode.com"><img alt="Hits of Code" src="https://hitsofcode.com/github/craft-plugins/benchmark?branch=1.x"></a>
</p>

Simple benchmark plugin with basic functionality for benchmarking.

## Requirements

* **Craft CMS**: ^4.0
* **PHP**: ^8.0

## Installation

To install the plugin, follow these instructions.

1. Open your terminal and go to your Craft project:
    ```
    cd /path/to/project
    ```

2. In your terminal run `composer require craft-plugins/benchmark`.

3. In the Control Panel, go to Settings → Plugins and click the “Install” button for Benchmark.

### Usage

```
{% do benchmarkStart('fetch_news') %}
    {% set entryQuery = craft.entries()
    .section('news')
    .orderBy('postDate DESC')
    .limit(10) %}
{% do benchmarkEnd('fetch_news') %}


Time elapsed: {{ benchmarkSummary()['fetch_news']['time']['elapsed_formated'] }}
Memory usage: {{ benchmarkSummary()['fetch_news']['memory']['usage_formated'] }}

//=> Time elapsed: 1ms
//=> Memory usage: 3.46KB
```

<table>
<tr>
<td>PHP function</td>
<td>Twig function</td>
<td>Description</td>
</tr>
<tr>
<td><code>CraftPlugins\Benchmark\benchmarkStart</code></td>
<td>benchmarkStart</td>
<td>Start benchmark prob.</td>
</tr>
<table>

## LICENSE
[The MIT License (MIT)](https://github.com/craft-plugins/benchmark/blob/master/LICENSE.md)
Copyright (c) [Sergey Romanenko](https://awilum.github.io/)
