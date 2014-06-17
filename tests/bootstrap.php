<?php

/*
 * This file is a part of the Data Replicator library.
 *
 * (c) 2014 Ebidtech
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

$errorDependencies = 'Install dependencies to run test suite. "php composer.phar install --dev"';

$file = __DIR__ . '/../vendor/autoload.php';
if (!file_exists($file)) {
    throw new RuntimeException($errorDependencies);
}

/** @var \Composer\Autoload\ClassLoader $loader */
$loader = require($file);
$loader->add('EBT\DataReplicator\Tests', __DIR__);
