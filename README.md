Silex Finder Provider
===============

[![Build Status](https://travis-ci.org/nachonerd/silex_finder_provider.svg?branch=master)](https://travis-ci.org/nachonerd/silex_finder_provider) [![Code Climate](https://codeclimate.com/github/nachonerd/silex_finder_provider/badges/gpa.svg)](https://codeclimate.com/github/nachonerd/silex_finder_provider) [![Test Coverage](https://codeclimate.com/github/nachonerd/silex_finder_provider/badges/coverage.svg)](https://codeclimate.com/github/nachonerd/silex_finder_provider/coverage)
[![Minimum PHP Version](https://img.shields.io/badge/php-%3E%3D%205.4-8892BF.svg?style=flat-square)](https://php.net/)

### License
GNU GPL v3

### Requirements
- [PHP version 5.4](http://php.net/releases/5_4_0.php)
- [Composer](https://getcomposer.org/)
- [SILEX](http://silex.sensiolabs.org/)
- [Synfony Finder](http://symfony.com/doc/current/components/finder.html)
- [PHP Unit 4.7.x](https://phpunit.de/) (optional)
- [PHP_CodeSniffer 2.x](http://pear.php.net/package/PHP_CodeSniffer/redirected) (optional)

### Install

```
composer require nachonerd/silex_finder_provider
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
