Silex Finder Provider
===============
[![Latest Stable Version](https://poser.pugx.org/nachonerd/silex-finder-provider/v/stable)](https://packagist.org/packages/nachonerd/silex-finder-provider) [![Total Downloads](https://poser.pugx.org/nachonerd/silex-finder-provider/downloads)](https://packagist.org/packages/nachonerd/silex-finder-provider) [![Latest Unstable Version](https://poser.pugx.org/nachonerd/silex-finder-provider/v/unstable)](https://packagist.org/packages/nachonerd/silex-finder-provider) [![License](https://poser.pugx.org/nachonerd/silex-finder-provider/license)](https://packagist.org/packages/nachonerd/silex-finder-provider) [![Build Status](https://travis-ci.org/nachonerd/silex_finder_provider.svg?branch=master)](https://travis-ci.org/nachonerd/silex_finder_provider) [![Code Climate](https://codeclimate.com/github/nachonerd/silex_finder_provider/badges/gpa.svg)](https://codeclimate.com/github/nachonerd/silex_finder_provider) [![Test Coverage](https://codeclimate.com/github/nachonerd/silex_finder_provider/badges/coverage.svg)](https://codeclimate.com/github/nachonerd/silex_finder_provider/coverage)
[![Minimum PHP Version](https://img.shields.io/badge/php-%3E%3D%205.4-8892BF.svg?style=flat-square)](https://php.net/)

[![SensioLabsInsight](https://insight.sensiolabs.com/projects/e5f97f78-f701-4cb0-b163-d12b019be831/big.png)](https://insight.sensiolabs.com/projects/e5f97f78-f701-4cb0-b163-d12b019be831)

### License
GPL-3.0

### Requirements
- [PHP version 5.4](http://php.net/releases/5_4_0.php)
- [Composer](https://getcomposer.org/)
- [SILEX](http://silex.sensiolabs.org/)
- [Synfony Finder](http://symfony.com/doc/current/components/finder.html)
- [PHP Unit 4.7.x](https://phpunit.de/) (optional)
- [PHP_CodeSniffer 2.x](http://pear.php.net/package/PHP_CodeSniffer/redirected) (optional)

### Install

```
composer require nachonerd/silex-finder-provider
```

### Usage

Include following line of code somewhere in your initial Silex file (index.php or whatever):

```php
...
$app->register(new \NachoNerd\Silex\Finder\Provider());
...
```
Now you have access to instance of finder throw $app['nn.finder'].

### Example

```php
<?php
    require_once __DIR__.'/../vendor/autoload.php';

    $app = new Silex\Application();

    // Considering the config.yml files is in the same directory as index.php
    $app->register(new \NachoNerd\Silex\Finder\Provider());

    ...
    $finder = $app["nn.finder"];
    $finder->files()->in(__DIR__);
    foreach ($finder as $file) {
        // Dump the absolute path
        var_dump($file->getRealpath());

        // Dump the relative path to the file, omitting the filename
        var_dump($file->getRelativePath());

        // Dump the relative path to the file
        var_dump($file->getRelativePathname());
    }
    ...
```

### What new in version __1.1.0__ ?

#### I Add New Sort Desc methods

The methods sort in the original finder are ASC. I add DESC sort method.

- sortByModifiedTimeDesc

```php
<?php
    require_once __DIR__.'/../vendor/autoload.php';

    $app = new Silex\Application();

    // Considering the config.yml files is in the same directory as index.php
    $app->register(new \NachoNerd\Silex\Finder\Provider());

    ...
    $finder = $app["nn.finder"];
    $finder->files()->sortByModifiedTimeDesc()->in(__DIR__);
    foreach ($finder as $file) {
        // Dump the absolute path
        var_dump($file->getRealpath());
    }
    ...
```

- sortByChangedTimeDesc

```php
<?php
    require_once __DIR__.'/../vendor/autoload.php';

    $app = new Silex\Application();

    // Considering the config.yml files is in the same directory as index.php
    $app->register(new \NachoNerd\Silex\Finder\Provider());

    ...
    $finder = $app["nn.finder"];
    $finder->files()->sortByChangedTimeDesc()->in(__DIR__);
    foreach ($finder as $file) {
        // Dump the absolute path
        var_dump($file->getRealpath());
    }
    ...
```

- sortByAccessedTimeDesc

```php
<?php
    require_once __DIR__.'/../vendor/autoload.php';

    $app = new Silex\Application();

    // Considering the config.yml files is in the same directory as index.php
    $app->register(new \NachoNerd\Silex\Finder\Provider());

    ...
    $finder = $app["nn.finder"];
    $finder->files()->sortByAccessedTimeDesc()->in(__DIR__);
    foreach ($finder as $file) {
        // Dump the absolute path
        var_dump($file->getRealpath());
    }
    ...
```

- sortByTypeDesc

```php
<?php
    require_once __DIR__.'/../vendor/autoload.php';

    $app = new Silex\Application();

    // Considering the config.yml files is in the same directory as index.php
    $app->register(new \NachoNerd\Silex\Finder\Provider());

    ...
    $finder = $app["nn.finder"];
    $finder->files()->sortByTypeDesc()->in(__DIR__);
    foreach ($finder as $file) {
        // Dump the absolute path
        var_dump($file->getRealpath());
    }
    ...
```

- sortByNameDesc

```php
<?php
    require_once __DIR__.'/../vendor/autoload.php';

    $app = new Silex\Application();

    // Considering the config.yml files is in the same directory as index.php
    $app->register(new \NachoNerd\Silex\Finder\Provider());

    ...
    $finder = $app["nn.finder"];
    $finder->files()->sortByNameDesc()->in(__DIR__);
    foreach ($finder as $file) {
        // Dump the absolute path
        var_dump($file->getRealpath());
    }
    ...
```
#### I Add Get N First Files or Dirs
Now you can get the n first files or dirs. And if you combine this new method
with the sort desc new methods you can get last first files or dirs.

```php
<?php
    require_once __DIR__.'/../vendor/autoload.php';

    $app = new Silex\Application();

    // Considering the config.yml files is in the same directory as index.php
    $app->register(new \NachoNerd\Silex\Finder\Provider());

    ...
    $finder = $app["nn.finder"];
    $finder->files()->sortByChangedTimeDesc()->in(__DIR__);
    $finder = $finder->getNFirst(10);
    foreach ($finder as $file) {
        // Dump the absolute path
        var_dump($file->getRealpath());
    }
    ...
```

```php
<?php
    require_once __DIR__.'/../vendor/autoload.php';

    $app = new Silex\Application();

    // Considering the config.yml files is in the same directory as index.php
    $app->register(new \NachoNerd\Silex\Finder\Provider());

    ...
    $finder = $app["nn.finder"];
    $finder->files()->in(__DIR__);
    $finder = $finder->getNFirst(10);
    foreach ($finder as $file) {
        // Dump the absolute path
        var_dump($file->getRealpath());
    }
    ...
```
