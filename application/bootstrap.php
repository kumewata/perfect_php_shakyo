<?php
/**
 * Created by PhpStorm.
 * User: kumew
 * Date: 2018/01/07
 * Time: 20:40
 */

require 'core/ClassLoader.php';

$loader = new ClassLoader();
$loader->registerDir(dirname(__FILE__) . '/core');
$loader->registerDir(dirname(__FILE__) . '/models');
$loader->register();